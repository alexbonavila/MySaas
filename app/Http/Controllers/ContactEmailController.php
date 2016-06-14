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
        //FLASH NOTIFICATION
        Flash::message('Email sent!');
        //REDIRECT WELCOME
        return redirect()->route('welcome');
        $this->sendEmail();
    }
    public function sendEmail()
    {
        $this->user->email = "adamalvarado@iesebre.com";
        $this->dispatch(new SendSubscriptionEmail($this->user));
        echo "Done!";
    }
}