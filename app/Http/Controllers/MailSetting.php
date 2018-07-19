<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailClass;
use Illuminate\Support\Facades\Mail;
class MailSetting extends Controller
{
    //

    public function send(Request $request){

    	$name=$request->input('name');
    	$phone=$request->input('phone');
    	$email=$request->input('email');
    	$msg=$request->input('msg');


    	Mail::to('49d8f34b0d-70a579@inbox.mailtrap.io')->send(new MailClass($name,$phone,$email,$msg));
    	return redirect()->action('IndexController@index'); 
    }
}
