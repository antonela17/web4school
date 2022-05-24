<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    //
    public function index($subjectName,$classId,$gradeNumber){
        $gradeMembers = Subjects::query()
                       ->join('evaluations','evaluations.subjectId','=','subject.id')
                       ->where('subject.mesues_id',Auth::user()->id)
                       ->where('subject.name',$subjectName)
                       ->where('subject.classId',$classId)
                       ->where('evaluations.number',$gradeNumber)
                        ->get(['evaluations.user_id','evaluations.grade'])->toArray();
        $students =[];

        foreach ($gradeMembers as $member){
            $students[]=[ User::query()->where('id',$member['user_id'])->first(),$member['grade']];
        }

        return view('grade.show')->with(compact('students','classId','subjectName','gradeNumber'));

    }

    public function showEditGrade($subjectName,$classId,$gradeNumber,$userId,Request $request){

        $grade = $request->input('grade');

        return view('grade.edit')->with(compact('subjectName','classId','gradeNumber','userId','grade'));

    }

    public function updateGrade(Request $request){

        try {
            Grade::query()->where('user_id',$request->user_id)->where('number',$request->grade_number)->firstOrFail()
                ->update([ 'grade'=>$request->grade]);

            return redirect()->back()->with('success','Grade was changed');

        }catch (\Exception $e){
            return redirect()->back()->with('error','errpr');

        }




    }
}
