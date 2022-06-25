<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
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

        // dd($detail);

        Mail::to("tagiang2001thi@gmail.com")->send(new TestMail($detail));
        return redirect()->back();
    }
}
