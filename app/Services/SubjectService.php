<?php

namespace App\Services;



use App\Models\Subjects;

class SubjectService
{
    public static function getSubjects(){
        return Subjects::query()->paginate(8);
    }
    public static function getSubject($id){
        return Subjects::query()->where('id',$id)->firstOrFail();
         }

}
