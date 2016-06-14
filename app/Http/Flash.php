<?php

namespace App\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class Flash extends Facade
{
    protected $request;
    /**
     * Flash constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function message($message) {
        //FLASH NOTIFICATION
        $this->request->session()->flash(
            'flash_message',
            $message
        );
    }
}