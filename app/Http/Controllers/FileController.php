<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    public function destroy($ticketId, $filename)
    {   
        $filePath = public_path("uploads/tickets/{$ticketId}/{$filename}");

        if (File::exists($filePath)) {
            unlink($filePath);
    

            return response()->json(['message' => 'File deleted successfully.'], 200);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }
}
