<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use App\Models\User;
use App\Services\ClassService;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = SubjectService::getSubjects();
        return view('student.index')->with(compact('subjects'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'csv_file' => 'required',
        ]);

        if ($request->hasFile('csv_file')) {

            $request->file('csv_file')->storeAs('files', 'subjects.csv');

            $newSubjects = $this->csvToArray('C:\Users\Ela\Desktop\web4school - Backup\storage\app\files\subjects.csv');

            if (end($newSubjects)[0] != "SubjectName" || end($newSubjects)[1] != "TeacherEmail") {

                return redirect()->back()->with('error', 'Enter csv file like the shown example!');
            }

            foreach ($newSubjects as $newSubject) {

                try {
                    $teacher_id = UserService::getUserByEmail($newSubject['TeacherEmail'])->id;

                    $subject = [
                        'name' => $newSubject['SubjectName'],
                        'mesues_id' => $teacher_id,
                        'classId' => $request->class_id
                    ];

                    Subjects::create($subject);
                } catch (\Exception $e) {
                    continue;
                }


            }

            return redirect()->route('class.index')->with('success', 'Data updated successfully');

        } else {
            return redirect()->back()->with('error', 'An error occurred. Please try again later!');
        }

    }

    public function newSubjects($id)
    {
        return view('backend.subjects.create')->with(compact('id'));
    }

    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            $data[] = $header;
            fclose($handle);
        }

        return $data;
    }

    //
}
