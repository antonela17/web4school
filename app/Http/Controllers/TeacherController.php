<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
         if ($request->input('search')) {
             $search = $request->input('search');
             $teachers = User::query()
                 ->where('role_id',2)
                 ->where([['name', 'LIKE', '%'. $search . '%']])
                 ->paginate(10);
         }
         else{
        $teachers = UserService::getTeacher()->paginate(10);}

        return view('backend.teachers.index', compact('teachers'));
    }


    public function create()
    {
        return view('backend.teachers.create');
    }


    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        if ($request->hasFile('csv_file') and $request->csv_file->getClientOriginalExtension()=="csv") {

            $request->file('csv_file')->storeAs('files', 'teachers.csv');

            $newTeachers = $this->csvToArray('C:\Users\Ela\Desktop\web4school - Backup\storage\app\files\teachers.csv');

            if (end($newTeachers)[0] != "name" || end($newTeachers)[1] != "surname" || end($newTeachers)[2] != "email") {

                return redirect()->back()->with('error', 'Enter csv file like the shown example!');
            }

            foreach ($newTeachers as $newTeacher) {
                $newTeacher['password'] = Hash::make('12345678');
                $newTeacher['role_id'] = 2;
                try {
                    User::create($newTeacher);
                } catch (\Exception $e) {
                    continue;
                }

            }

            return redirect()->route('teachers.index')->with('success', 'Data updated successfully');

        } else {
            return redirect()->back()->with('error', 'An error occurred. Please try again later! Enter valid csv file');
        }
    }


    public function show($id)
    {
        $teacher= UserService::getUser($id);

        return view('backend.teachers.show', compact('teacher'));

    }


    public function edit($id)
    {
        $teacher= UserService::getUser($id);

        return view('backend.teachers.edit', compact('teacher'));
    }


    public function update(Request $request,  $id)
    {

        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $teacher = UserService::getUser($id);
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($teacher->name).'-'.$teacher->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('img/profile'), $profile);
        } else {
            $profile = $teacher->profile_picture;
        }
        try {
            $teacher->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'profile_picture'   => $profile
            ]);
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }

        return redirect()->route('teachers.index')->with('success', 'Your database was updated successfully!');
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
