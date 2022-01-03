<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Email;

class EmailController extends Controller
{
    public function index(Request $request) {

         $validatedData = $request->validate([
        'email' => 'required',
        'message' => 'required',
    ]);

        $email = $request->input('email');
        $message = $request->input('message');


        Email::create([
            'email'=>$email,
            'description'=>$message,
    
        ]);
        

        $to = $email;
        $subject = "test";
        $txt = $message;
        $headers = "From: test@example.com";

       //mail($to,$subject,$txt,$headers);

        $request->session()->flash('alert_success', 'Email has been successful sent!');

            return redirect('http://127.0.0.1:8000/');

    }
}
