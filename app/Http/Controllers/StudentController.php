<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        if ($request->input('search')) {
            $search = $request->input('search');
            $students = User::query()
                ->where('role_id', 3)
                ->where([['name', 'LIKE', '%' . $search . '%']])
                ->paginate(10);
        } else {
            $students = UserService::getStudents()->paginate(10);
        }

        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.students.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'csv_file' => 'required',
        ]);

        if ($request->hasFile('csv_file')) {

            $request->file('csv_file')->storeAs('files', 'students.csv');

            $newStudents = $this->csvToArray('C:\Users\Ela\Desktop\web4school - Backup\storage\app\files\students.csv');

            if (end($newStudents)[0] != "name" || end($newStudents)[1] != "surname" || end($newStudents)[2] != "email"||end($newStudents)[3] != "Class") {

                return redirect()->back()->with('error', 'Enter csv file like the shown example!');
            }

            foreach ($newStudents as $newStudent) {
                $newStudent['password'] = Hash::make('12345678');
                $newStudent['role_id'] = 3;
                try {
                    User::create($newStudent);
                } catch (\Exception $e) {
                    continue;
                }

            }

            return redirect()->route('students.index')->with('sucess', 'Data updated successfully');

        } else {
            return redirect()->back()->with('error', 'An error occurred. Please try again later!');
        }

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


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $student = UserService::getUser($id);
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($student->name) . '-' . $student->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('img/profile'), $profile);
        } else {
            $profile = $student->profile_picture;
        }
        try {
            $student->update([
                'name' => $request->name,
                'surname'=>$request->surname,
                'email' => $request->email,
                'profile_picture' => $profile
            ]);
        } catch (\Exception $e) {
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
            if ($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/img/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }

    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;


        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            $data[] = $header;
            fclose($handle);
        }

        return $data;
    }
}
