<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(){
        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'this is the email test'
        ];
        
        try {
            Mail::to('ngarukiyimanasostene@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great,check your email.']);
        } catch (\Throwable $th) {
            return response()->json(['Sorry, something went wrong']);
        }
   }
}
