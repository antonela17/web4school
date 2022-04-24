<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'username'=>'required|max:25|unique:users',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
            'role_id' => 'required',
        ]);
        try {
            $newUser = UserService::createData($request);
            return redirect()->back()->with('success', 'Your database was uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }
    }

    public function read()
    {
        $conn=mysqli_connect("localhost","root","") or die("Could not establish connection");
        mysqli_select_db("users") or die ("Database not found");
        $query="Select * From Users;";
        $result=mysqli_query($conn,$result);
        while($row=mysqli_fetch_array($result,MYSQL_ASSOC())){
            return 
        }
       

        mysqli_close($conn);
        


    }

    public function update(Request $request, User $user)
    {
        $request -> validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'username'=>'required|max:25|unique:users',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
            'role_id' => 'required',
        ]);
        $user->name=$request->name;
        $user->surname=$request->surname;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role_id=$request->role_id;

        if($blog->save()){
            return redirect('')->with('success','User Updated')
        }else{
            //handle error
        }
            

    }

    public function delete(Request $request)
    {
        try {
            UserService::deleteData($request);
            return redirect()->back()->with('success', 'Your database element was deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }

    }

}