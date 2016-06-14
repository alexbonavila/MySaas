<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

App::bind('Flash',App\Http\Flash::class);

Route::group(['middleware' => ['web']], function () {

    Route::get('/',['as' => 'welcome', function () {
        return view('welcome');
    }]);


    Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToAuthenticationServiceProvider');
    Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleAuthenticationServiceProviderCallback');
//    Route::get('auth/github', 'Auth\AuthController@redirectToGithubProvider');
//    Route::get('auth/github/callback', 'Auth\AuthController@handleGithubProviderCallback');
//    Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebookProvider');
//    Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookProviderCallback');
//    Route::get('auth/google', 'Auth\AuthController@redirectToGoogleProvider');
//    Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleProviderCallback');
    Route::get('csstransitions', function(){
        return view('tinkering.csstransitions');
    });
    Route::get('sendpushnotify', function(){
        return view('pushnotify.sendpushnotify');
    });

    Route::get('plans', 'PlansController@index');
    Route::get('register_subsciption', function(){
        return view('auth.register_subsciption');
    });
    Route::post('registerAndSubscribeToStripe', 'Auth\AuthController@registerAndSubscribeToStripe');

    Route::post('sendContactEmail','ContactEmailController@send');

    Route::get('reports/dailySales', 'ReportsController@dailySales');
});