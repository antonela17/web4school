<?php

namespace App\Http\Controllers\Student;

use App\Models\Subjects;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController
{

    public function showSubject(){
        $class_id = Auth::user()->class_id;
        $subjects = Subjects::query()->where('classId',$class_id)->orderBy('name')->paginate(10);

        return view('student.index')->with(compact('subjects'));
    }

    public function showSubjectMembers($subjectName){

        $students = User::query()
            ->select([
                'users.name',
                'users.surname',
                'users.email',
                'users.profile_picture'
            ])
            ->join('class', 'class.id', '=', 'users.class_id')
            ->join('subject', 'subject.classId', '=', 'class.id')
            ->where('users.class_id', '=', Auth::user()->class_id)
            ->where('subject.Name', '=', $subjectName)
            ->paginate(7);

        return view('student.members')->with(compact('students'));
    }

}
