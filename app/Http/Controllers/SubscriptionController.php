<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $creditCardToken = $request->input('stripeToken');
        $user = User::find(1);
        $user->newSubscription('ID03', 'ID03')->create($creditCardToken);
    }
}
