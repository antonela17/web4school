<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\SendMailWithAttachment;
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
    public function sendAtttachment(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $user= User::query()
            ->where('users.id','=',Auth::user()->id)
           ->join('class','class.id','=','users.class_id')->get(['users.name as emer','class.name','class.year'])->toArray()[0];

        $data = ['name'=>$user['emer'],
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
