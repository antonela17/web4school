<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public static function createData(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'=> $request->input('role'),
            'class_id'=>null,
        ]);
    }
    

    public static function deleteData(Request $request)
    {
        User::query()->where("username",$request->input('username'))->delete();
    }
}
