<?php

namespace App\Http\Controllers;
use App\Profile;
use App\ProfileCreatorHtml;
use App\ProfileCreatorJson;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        return $profile->show(Auth::user());
    }
}