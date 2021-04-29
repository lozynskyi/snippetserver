<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show(User $user)
    {
        dd($user);
    }
}
