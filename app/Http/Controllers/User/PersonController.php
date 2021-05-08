<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\Users\PublicUserTransformer;
use App\Transformers\Users\UserTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        try {
            $this->authorize('as', $user);

            $this->validate($request, [
                'email' => 'required|email|unique:users,email,'.$request->user()->id,
                'username' => 'required|alpha_dash|unique:users,username,'.$request->user()->id,
                'name' => 'required',
                'password' => 'nullable|min:6'
            ]);
            $user->update(
                $request->only('email', 'name', 'username')
            );

        } catch (AuthorizationException $e) {
            return response()->json([
                'errors' => [
                    'action' => ['Authenticated user is not authorized to do this action.']
                ]
            ], 403);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => [
                    $e->errors()
                ]
            ], 422);
        }

        return fractal()
            ->item($request->user())
            ->transformWith(new UserTransformer())
            ->toArray();
    }
}
