<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        if ($request->input('search')) {
            $search = $request->input('search');
            $students = User::query()
                ->where('role_id',3)
                ->where([['name', 'LIKE', '%'. $search . '%']])
                ->paginate(10);
        }
        else {
            $students = UserService::getStudents()->paginate(10);
        }

        return view('backend.students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'parent_id'         => 'required|numeric',
            'class_id'          => 'required|numeric',
            'roll_number'       => [
                'required',
                'numeric',
                Rule::unique('students')->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id);
                })
            ],
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password)
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->student()->create([
            'parent_id'         => $request->parent_id,
            'class_id'          => $request->class_id,
            'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('Student');

        return redirect()->route('student.index');
    }


    public function show($id)
    {
        $student = UserService::getUser($id);

        return view('backend.students.show', compact('student'));
    }


    public function edit($id)
    {
        $student = UserService::getUser($id);

        return view('backend.students.edit', compact('student'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $student = UserService::getUser($id);
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($student->name).'-'.$student->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('img/profile'), $profile);
        } else {
            $profile = $student->profile_picture;
        }
        try {
            $student->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'profile_picture'   => $profile
            ]);
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
    }

        return redirect()->route('students.index')->with('success', 'Your database was updated successfully!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/img/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }
}
