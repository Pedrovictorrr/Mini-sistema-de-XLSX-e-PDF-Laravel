<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role == '2') {
            $tickets = Ticket::with(['user', 'responsavel', 'modulo', 'situacao'])
                ->get();
        } else {
            $tickets = Ticket::with(['user', 'responsavel', 'modulo', 'situacao'])
                ->where('user_id', auth()->user()->id)
                ->get();
        }

        foreach ($tickets as $ticket) {
            $ticket->load(['mensagens' => function ($query) {
                $query->with('user')->orderBy('created_at', 'asc');
            }]);
        }

        return response()->json(['data' => $tickets], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['anexo'] = "";
        $data['ultima_resposta'] = now();
        $ticket = Ticket::create($data);

        $mensagem = new Mensagem();
        $mensagem->user_id = Auth::id();
        $mensagem->ticket_id = $ticket->id;
        $mensagem->mensagem = $request->mensagem;
        $mensagem->save();

        if ($request->hasFile('anexo')) {

            foreach ($request->file('anexo') as $file) {
                $filename = $file->getClientOriginalName();

                // Crie um diretório para o ticket usando o ID do ticket
                $path = public_path("uploads/tickets/{$ticket->id}");

                // Verifique se o diretório existe, se não, crie-o
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                // Mova o arquivo para o diretório
                $file->move($path, $filename);
            }
            $ticket->anexo = "uploads/tickets/{$ticket->id}/";
            $ticket->save();
        }
        return redirect()->route('suporte');
    }

    public function edit(Ticket $ticket)
    {
        $ticket->load('user');
        return view('criar-ticket')->with('ticket', $ticket);
    }

    public function update(Ticket $ticket, Request $request)
    {

        $data = $request->except('anexo', 'mensagemModal');

        $ticket->fill($data);
        $ticket->anexo = "uploads/tickets/{$ticket->id}/";
        $ticket->save();

        if (!empty($request->mensagemModal)) {
            $mensagem = new Mensagem;
            $mensagem->user_id = Auth::id();
            $mensagem->ticket_id = $ticket->id;
            $mensagem->mensagem = $request->mensagemModal;
            $mensagem->save();
        }

        if ($request->hasFile('anexo')) {
            foreach ($request->file('anexo') as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path("uploads/tickets/{$ticket->id}");

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                if (!file_exists($path . '/' . $filename)) {
                    $file->move($path, $filename);
                }
            }
            $ticket->anexo = "uploads/tickets/{$ticket->id}/";
            $ticket->save();
        }

        return redirect()->route('suporte');
    }
}
