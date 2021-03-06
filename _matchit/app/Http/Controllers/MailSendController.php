<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;

class MailSendController extends Controller
{
    public function mailsend(){
        $details = [
            'title' => 'Mail from MatchIT',
            'body' => 'Test Mail',
        ];

        \Mail::to('mujitha.m3@gmail.com')->send(new SendMail($details));
        echo 'Thanks';
    }
}
