<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use mysqli;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    //
    public function createUserView()
    {

        return view('createUser');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'username' => 'required|max:25|unique:users',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                "confirmed"
            ],
            'role_id' => 'required',
        ]);
        try {
            UserService::createData($request);
            return redirect()->route('read')->with('success', 'Your database was uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }
    }

    public function read()
    {

        $conn = new  mysqli("localhost", "root", "anto2001", "web4school", 3306) or die("Could not establish connection");
        $query = 'SELECT username,surname,role_id,name,email FROM users;';
        $result = mysqli_query($conn, $query);

        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }

        mysqli_close($conn);

        return view('users')->with(compact('data'));


    }

    public function editUser(Request $request)
    {

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $username = $request->input('username');
        $role = $request->input('role');
        return view('editTable')->with(compact(['name', 'username', 'email', 'surname', 'role']));
    }

    public function update(Request $request/*, User $user*/)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required',
            'username' => 'required'

        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $role_id = $request->input('role_id');
        $username = $request->input('username');

        try {
            User::query()->where("username", $username)->update(['name' => $name, 'surname' => $surname, 'email' => $email, 'role_id' => $role_id]);

            return redirect()->route('read')->with('success', 'User Updated Successfully!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'User not Updated. Please try again!');
        }
        // return redirect()->back()->with('success','User Updated');

    }

    public function delete(Request $request)
    {

        try {
            $username = $request->username;
            UserService::deleteData($username);
            return redirect()->back()->with('success', 'Data deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your data. Please try again later!');
        }

    }

}
