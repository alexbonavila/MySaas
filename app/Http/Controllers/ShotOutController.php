<?php

namespace App\Http\Controllers;

use App\Events\ShotoutAdded;
use App\Shotout;
use Auth;
use Event;
use Illuminate\Http\Request;
use App\Http\Requests;

class ShotOutController extends Controller
{
    protected $shotOut;

    /**
     * ShotOutController constructor.
     * @param $shotOut
     */
    public function __construct(ShotOut $shotOut)
    {
        $this->shotOut = $shotOut;
    }


    public function index()
    {
        return view('shotout');
    }
    public function shotout(Request $request)
    {
        if ($request->message == null){
            $request->message = "Error Notification";
        }

        $this->shotOut->message = $request->get('message');
        $this->shotOut->user_id = Auth::user()->id;
        $this->shotOut->save();
        Event::fire(new ShotOutAdded($this->shotOut));
        return view('shotout');
    }
}
