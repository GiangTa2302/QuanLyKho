<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\ReceiveMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        $detail = [
            'title' => $request->title,
            'name' => $request->name,
            'body' => $request->body,
            'email' => $request->email,
        ];

        Mail::to("tagiang2001thi@gmail.com")->send(new TestMail($detail));
        return redirect()->back();
    }

    public function receiveEmail(Request $request){
        $detail = [
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new ReceiveMail($detail));
        return redirect()->route('home');
    }
}
