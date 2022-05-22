<?php

namespace App\Services;

use App\Models\Classes;

class ClassService
{
    public static function getClasses(){
        return Classes::query()->paginate(8);
    }
    public static function getClass($id){
        return Classes::query()->where('id',$id)->firstOrFail();
    }
}
