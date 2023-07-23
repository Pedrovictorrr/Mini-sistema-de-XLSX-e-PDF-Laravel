<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportadorController extends Controller
{
    public function index()
    {


        return view('admin.exportador');
    }

   

    public function findFile(Request $request)
    {
      try {
        $teste = $request->all();
        dd($teste);
        return true;

      } catch (\Throwable $th) {
        //throw $th;
      }//code...//code...
    } 


    // Funções para gerar arquivos // 
    public function generatePlanoContabilFile()
    {

    }
}
