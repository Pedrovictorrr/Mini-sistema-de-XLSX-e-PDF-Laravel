<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['ultima_resposta'] = now()->format('d-M-y h.i.s.u A');
        $ticket = Ticket::create($data);

        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $filename = $file->getClientOriginalName();
        
            // Crie um diretório para o ticket usando o ID do ticket
            $path = public_path("uploads/tickets/{$ticket->id}");
        
            // Verifique se o diretório existe, se não, crie-o
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
        
            // Mova o arquivo para o diretório
            $file->move($path, $filename);
        
            // Atualize o ticket com o caminho do arquivo
            $ticket->anexo = "uploads/tickets/{$ticket->id}/{$filename}";
            $ticket->save();
        }

        return view('suporte-usuario');
    }
}
