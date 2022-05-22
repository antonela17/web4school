<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function index(){
        return view('file.index');
    }
    public function showFiles($id){
        $files=['files/test.pdf','files/vertetimStudenti.pdf'];
        return view('file.showFiles')->with(compact('files'));
    }
    public function getDocument(Request $request)
    {
if ($request['filename']){
        $filePath ="classFiles/". $request['filename'];

        // file not found
        if( ! Storage::disk('local')->exists($filePath) ) {
            abort(404);
        }

        $pdfContent = Storage::disk('local')->get($filePath);

        // for pdf, it will be 'application/pdf'
        $type       = Storage::disk('local')->mimeType($filePath);
        $fileName   = 'test';

        return Storage::disk('local')->response($filePath);
    }
return redirect()->back();
}
}
