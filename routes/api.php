<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth', 'namespace'=>'App\Http\Controllers\Auth'], function() {
    Route::post('signin', 'SignInController');
    Route::post('signup', 'SignUpController');
    Route::post('signout', 'SignOutController');
    Route::get('me', 'MeController');
});

Route::group(['prefix'=>'user/{user}', 'namespace'=>'App\Http\Controllers\User'], function() {
    Route::get('', 'PersonController@show');
    Route::patch('', 'PersonController@update');
});
