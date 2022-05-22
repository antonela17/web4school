<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function showFiles($id)
    {
        $files = ['files/test.pdf', 'files/vertetimStudenti.pdf'];
        return view('file.showFiles')->with(compact('files'));
    }

    public function getDocument(Request $request)
    {
        if ($request['filename']) {
            $filePath = "classFiles/" . $request['filename'];

            // file not found
            if (!Storage::disk('local')->exists($filePath)) {
                abort(404);
            }

            $pdfContent = Storage::disk('local')->get($filePath);

            // for pdf, it will be 'application/pdf'
            $type = Storage::disk('local')->mimeType($filePath);
            $fileName = 'test';

            return Storage::disk('local')->response($filePath);
        }
        return redirect()->back();
    }

    public function addFile(Request $request)
    {
        // Validate request
        $request->validate([
            'csv_file' => 'required',
        ]);

        if ($request->hasFile('csv_file')) {


           $fileName= $request->file('csv_file')->getClientOriginalName ();
            $request->file('csv_file')->storeAs('classFiles', $fileName);

            try {

                $subject= Subjects::query()->where('name',$request->subjectName)
                    ->where('classId',$request->classId)->first()->toArray();


                File::create([
                    'subject_id'=>$subject['id'],
                    'name'=>$fileName,

                ]);
            }catch (\Exception $e){
                dd($e);
                return redirect()->back()->with('error',"Your file couldn't upload. Please try again!");
            }
            return redirect()->back()->with('success','File uploaded successfully!');
        }
        else
        return redirect()->back()->with('error',"Your file couldn't upload. Please try again!");
    }
}
