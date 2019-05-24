<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.verify', 'cors.enable']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');

    // Testding voor reactapp
    Route::get('users/list', function(){
        $users = App\User::all();

        $response = ['success'=>true, 'data'=>$users];
        return response()->json($response, 201);
    });
});

Route::group(['middleware' => ['cors.enable']], function() {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
});
