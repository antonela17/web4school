<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view("contact.contact");
    }

    public function send(Request $request)
    {
        $data = ['name'=>$request->name,
            'email'=>$request->email,
            'qa'=>$request->qa];



        Mail::to("sytemadmin@gmail.com")->send(new Contact($data));

        return redirect()->back();

    }
}
