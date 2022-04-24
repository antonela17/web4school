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

    }

    public function update()
    {

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
