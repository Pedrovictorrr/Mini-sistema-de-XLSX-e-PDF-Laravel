<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Exports\PlanoContabilExport;
use Maatwebsite\Excel\Facades\Excel;

class PlanoContabilController extends Controller
{
    public function export() 
    {
        return Excel::download(new PlanoContabilExport(), ' PlanoContabil.xlsx');
    }
}
