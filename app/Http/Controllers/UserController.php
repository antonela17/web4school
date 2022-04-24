<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use mysqli;

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
        //dd(User::query()->get('name')->toArray());
        $conn= new  mysqli("localhost","root","anto2001","web4school",3306) or die("Could not establish connection");
        $query='SELECT * FROM users;';
        $result=mysqli_query($conn,$query);

        $data  = [];
        while($row=mysqli_fetch_array($result)){
            $data[] = $row;
        }

        mysqli_close($conn);

        return view('createTable')->with(compact('data'));



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
        $user->name=$request->input('name');
        $user->surname=$request->input('surname');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->role_id=$request->input('role_id');

        if($user->save()){
            return redirect('')->with('success','User Updated');
        }else{
            return redirect('')->with('error','User not Updated');
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
