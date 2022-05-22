<?php

namespace App\Http\Controllers\Student;

use App\Models\Subjects;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController
{

    public function showSubject(){
        $class_id = Auth::user()->class_id;
        $subjects = Subjects::query()->where('classId',$class_id);
        return view('student.index')->with(compact($subjects));
    }

}
