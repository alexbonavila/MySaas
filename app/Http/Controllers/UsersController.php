<?php

namespace App\Http\Controllers;
use App\User;
use Cache;
use Illuminate\Http\Request;
use App\Http\Requests;
class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = Cache::remember('query.users', 10, function(){
            return User::all();
        });
        return $users;
    }
    public function store()
    {
        User::create(['name' =>'Pepe', 'email' => 'pepe@pepitor.com']);
        Cache::forget('query.users');
    }
    public function update()
    {
        $user = User::first();
        $user->name='Pepita';
        $user->save;
        Cache::forget('query.users');
    }
    public function destroy($id)
    {
        User::destroy($id);
        Cache::forget('query.users');
        //Cache:flush();
    }
}
