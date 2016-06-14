<?php

namespace App\Http\Controllers;

use App\Facades\Flash;
use App\Jobs\SendSubscriptionEmail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class ContactEmailController extends Controller
{
    protected $user;
    /**
     * ContactEmailController constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function send(Request $request){
        $message = array('name' => $request['Name'],
            'email' => $request['Mail'],
            'message' => $request['Message']);
        $this->sendEmail($message);
        //FLASH NOTIFICATION
        Flash::message('Email sent!');
        //REDIRECT WELCOME
        return redirect()->route('welcome');
    }
    public function sendEmail($message)
    {
        $this->dispatch(new SendSubscriptionEmail($message));
    }
}