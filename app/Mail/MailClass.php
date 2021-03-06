<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;


    protected $name;
    protected $phone;
    protected $email;
    protected $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$phone,$email=FALSE,$msg=FALSE)
    {
        //
        $this->name=$name;
        $this->phone=$phone;
        $this->email=$email;
        $this->msg=$msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(env('THEME').'.email.email-contact')->with(['name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'msg'=>$this->msg
        ])->subject('New');
    }
}
