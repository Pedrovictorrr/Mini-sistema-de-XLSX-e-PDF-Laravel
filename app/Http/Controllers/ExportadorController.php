<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportadorController extends Controller
{
    public function index()
    {
        return view('admin.exportador');
    }
}
