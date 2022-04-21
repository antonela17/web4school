<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(Request $request){

        try {
            $newUser=UserService::createData( $request);
        }catch (\Exception $e){

        }
    }
    public function read(){

    }
    public function update(){

    }
    public function delete(){

    }
}
