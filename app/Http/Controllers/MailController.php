<?php

namespace App\Http\Controllers;
use App\Mail\FishermanMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendmail(Request $request){
        Mail::to('kk8225248@gmail.com')->send(new FishermanMail($name));
    }
}
