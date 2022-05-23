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
        $request->validate([
            'name' => 'required|min:7',
            'email'=>  'required|email',
            'qa'=>  'required|min:20|max:300'
        ]);

        $data = ['name'=>$request->name,
            'email'=>$request->email,
            'qa'=>$request->qa];


        try {
            Mail::to("sytemadmin@gmail.com")->send(new Contact($data));

            return redirect()->back()->with('success', 'Email sent successfully');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Email sent successfully');
        }

    }
}
