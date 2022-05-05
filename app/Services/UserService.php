<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public static function createData(Request $request)
    {
        $user= new User;
        $user->name= $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input("role_id");

        $user->save();

    }


    public static function deleteData($username)
    {
        User::query()->where("username",$username)->delete();
    }
}
