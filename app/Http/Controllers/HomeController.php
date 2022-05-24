<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id==1){
            $students = User::query()->where('role_id','3')->count();
            $teachers = User::query()->where('role_id','2')->count();
            $classes = Classes::query()->count();


            return view('home')->with(compact('teachers','students','classes'));
        }elseif (Auth::user()->role_id==2){
            $students = User::query()
                ->join('class','class.id','=','users.class_id')
                ->join('subject','subject.classId','=','class.id')
                ->where('subject.mesues_id',Auth::user()->id)
                ->count();
            $classes = Classes::query()
                ->join('subject','subject.classId','=','class.id')
                ->where('subject.mesues_id',Auth::user()->id)
                ->count();
            return view('home')->with(compact('students','classes'));
        }
        else{

            $students = User::query()->where('class_id',Auth::user()->class_id)->count();
            $teachers =  User::query()
                ->join('class','users.class_id','=','class.id')
                ->join('subject','subject.classId','=','class.id')
                ->where('users.class_id',Auth::user()->class_id)->distinct('subject.mesues_id')->count();
            $subjects = User::query()
                       ->join('class','users.class_id','=','class.id')
                       ->join('subject','subject.classId','=','class.id')
                       ->where('users.class_id',Auth::user()->class_id)
                ->distinct('subject.name')->count();


            return view('home')->with(compact('teachers','students','subjects'));
        }

    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'surname' => 'required|string|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug(auth()->user()->name) . '-' . auth()->id() . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('img/profile/'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $user = auth()->user();
        try {
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'profile_picture' => $profile
            ]);
            return redirect()->route('profile')->with('success', 'Your database was updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->with('error', 'An error occurred while processing your data. Please try again later!');
        }

    }
}
