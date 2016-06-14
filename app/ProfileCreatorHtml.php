<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class ProfileCreatorHtml extends AbstractProfiler
{
    public function show($user)
    {
        return "<div>
               Id: <b>". $this->getUserId(Auth::user($user)) ."</b> <br />
               Name: <b>". $this->getUserName(Auth::user($user)) ."</b>
        </div>";
    }
}