<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\Users\PublicUserTransformer;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show(User $user)
    {
        return fractal()
            ->item($user)
            ->transformWith(new PublicUserTransformer())
            ->toArray();
    }

    public function update(User $user, Request $request)
    {
        //dd($user->id);
        $this->authorize('as', $user);

        dd($request->only('email', 'name', 'username'));

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$request->user()->id,
            'username' => 'required|alpha_dash|unique:users,username,'.$request->user()->id,
            'name' => 'required',
            'password' => 'nullable|min:6'
        ]);

        $user->update(
            $request->only('email', 'name', 'username')
        );
    }
}
