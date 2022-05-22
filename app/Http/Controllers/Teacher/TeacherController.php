<?php

namespace App\Http\Controllers\Teacher;

use App\Models\File;
use App\Models\Grade;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController
{
    public function showSubject()
    {
        $mesues_id = Auth::user()->id;
        $subjects = Subjects::query()->where('mesues_id', $mesues_id)
            ->join('class', 'subject.classId', '=', 'class.id')
            ->get([
                'subject.name as name',
                'class.year',
                'class.name as class',
                'class.id as id'
            ]);

        return view('teacher.index')->with(compact('subjects'));
    }

    public function viewClass($subjectName,$class)
    {
        $files = Subjects::query()->where('subject.name', '=', $subjectName)
            ->where('mesues_id', '=', Auth::user()->id)
            ->where('classId', $class)
            ->join('class', 'class.id', '=', 'subject.classId')->
             join('files','files.subject_id','=','subject.id')
             ->get([
                 'files.name',
                 'files.id'
             ])->toArray();

        return view('teacher.subject')->with(compact('files', 'subjectName','class'));
    }

    public function members($subjectName, $class)
    {
        $students = Subjects::query()->where('subject.name', '=', $subjectName)
            ->where('mesues_id', '=', Auth::user()->id)
            ->where('classId', $class)
            ->join('class', 'class.id', '=', 'subject.classId')
            ->join('users', 'users.class_id', '=', 'class.id')
            ->get([
                'users.id',
                'users.name',
                'users.surname',
                'users.username',
                'users.email',
                'subject.id as subjectId'
            ]);

        return view('teacher.members')->with(compact('students'));
    }

    public function showGrades($subjectName, $class)
    {
        $grades = Subjects::query()->where('name', $subjectName)
            ->where('classId', $class)
            ->join('evaluations', 'evaluations.subjectId', '=', 'subject.id')
            ->groupBy('evaluations.number')
            ->get(['evaluations.number']);

        return view('teacher.grades')->with(compact('grades','class'));
    }

    public function newGrade($subjectId)
    {

        return view('teacher.newGrade')->with(compact('subjectId'));
    }

    public function addGrades(Request $request)
    {
        // Validate request
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        if ($request->hasFile('csv_file') and $request->csv_file->getClientOriginalExtension() == "csv") {

            $request->file('csv_file')->storeAs('files', 'grades.csv');

            $newTeachers = $this->csvToArray('C:\Users\Ela\Desktop\web4school - Backup\storage\app\files\grades.csv');

            if (end($newTeachers)[0] != "number" || end($newTeachers)[1] != "userEmail") {

                return redirect()->back()->with('error', 'Enter csv file like the shown example!');
            }

            foreach ($newTeachers as $newTeacher) {
                try {
                    $grades = [];
                    $grades['number'] = $newTeacher['number'];
                    $grades['user_id'] = User::query()->where('email', $newTeacher['userEmail']);
                    $grades['subjectId'] = $request->subject_id;

                    Grade::create($grades);
                } catch (\Exception $e) {
                    continue;
                }

            }

            return redirect()->route('teacher.grades')->with('success', 'Grades added successfully');

        } else {
            return redirect()->back()->with('error', 'An error occurred. Please try again later! Enter valid csv file');
        }
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
}
