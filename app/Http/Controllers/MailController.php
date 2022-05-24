<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\SendMailWithAttachment;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function create()
    {
        return view("contact.sendEmail");
    }
    public function createVS(){
        return view("contact.senEmailVS");
    }
    public function sendAtttachment(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $grades=Grade::query()->where('evaluations.user_id',Auth::user()->id)
            ->join('subject','subject.id','=','evaluations.subjectId')
            ->get(['subject.name','evaluations.grade'])->toArray();

        $data=[
            'user'=>['name'=>Auth::user()->name,'surname'=>Auth::user()->surname],
            'grades'=>$grades];

        // selecting PDF view
        $pdf = PDF::loadView('emails.vertetimNotash',$data);
        Storage::disk('local')->put('files/vertetimNotash.pdf',$pdf->output());


        Mail::queue(new SendMailWithAttachment('vertetimNotash.pdf'));

        return redirect()->route('home')->with('success', 'Email sent successfully');;

    }


    public function sendVS(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $user= User::query()
            ->where('users.id','=',Auth::user()->id)
            ->join('class','class.id','=','users.class_id')->get(['users.name as emer','users.surname as mbiemer','class.name','class.year'])->toArray()[0];

        $data = ['name'=>$user['emer'],
            'surname'=>$user['mbiemer'],
            'class_name'=>$user['name'],
            'class_year'=>$user['year'],
        ];

        // selecting PDF view
        $pdf = PDF::loadView('emails.vertetimStudenti',$data);
        Storage::disk('local')->put('files/vertetimStudenti.pdf',$pdf->output());
//        dd($pdf);

        Mail::queue(new SendMailWithAttachment('vertetimStudenti.pdf'));

        return redirect()->route('home')->with('success', 'Email sent successfully');;

    }
}
