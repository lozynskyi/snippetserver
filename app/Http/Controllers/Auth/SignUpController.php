<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|alpha_dash|unique:users,username',
            'name' => 'required',
            'password' => 'nullable|min:6'
        ]);

    }
}
