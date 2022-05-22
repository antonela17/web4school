<?php

namespace App\Http\Controllers;

use App\Services\ClassService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClassController extends Controller
{
    public function index(){
        $classes = ClassService::getClasses();
        return view('backend.classes.index')->with(compact('classes'));
    }
    public function indexEdit($id){
        $class = ClassService::getClass($id);
        return view('backend.classes.editClass')->with(compact('class'));
    }
    public function update(Request $request){
        $request->validate([
            'class_id'=>'required',

        ]);
        $id = $request->input('class_id');
        $class = ClassService::getClass($id);

        try {
            $class->update([
                'year' => $request->year,
                'name' => $request->name,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }

        return redirect()->route('class.index')->with('success', 'Your database was updated successfully!');
    }
    public function newStudents($id){

        $class= ClassService::getClass($id);
        return view('backend.classes.addStudents')->with(compact('class'));
    }
    public function store(Request $request){

        // Validate request
        $request->validate([
            'csv_file' => 'required',
            'class_id'=>'required'
        ]);

        if ($request->hasFile('csv_file')and $request->csv_file->getClientOriginalExtension()=="csv") {

            $request->file('csv_file')->storeAs('files', 'newStudents.csv');

            $newStudents = $this->csvToArray('C:\Users\Ela\Desktop\web4school - Backup\storage\app\files\newStudents.csv');

            if (end($newStudents)[0] != "name" || end($newStudents)[1] != "surname" || end($newStudents)[2] != "email") {

                return redirect()->back()->with('error', 'Enter csv file like the shown example!');
            }

            foreach ($newStudents as $newStudent) {
                $newStudent['password'] = '$2y$10$whSv4FOm0CWIh0MUHBOcjelYDZW6n3b6j625yBKKztOrrZ.4YzhO6';
                $newStudent['role_id'] = 3;
                $newStudent['class_1'] = $request->input('class_id');
                try {
                    User::create($newStudent);
                } catch (\Exception $e) {
                    continue;
                }

            }

            return redirect()->route('students.index')->with('sucess', 'Data updated successfully');

        } else {
            return redirect()->back()->with('error', 'An error occurred. Please try again later!');
        }

    }
}
