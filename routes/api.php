<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'auth', 'namespace'=>'App\Http\Controllers\Auth'], function() {
    Route::post('signin', 'SignInController');
    Route::post('signout', 'SignOutController');
    Route::get('user', 'MeController');
});
