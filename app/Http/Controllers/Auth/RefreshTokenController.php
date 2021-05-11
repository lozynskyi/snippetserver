<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RefreshTokenController extends Controller
{

    public function __invoke(Request $request)
    {
        try {
            return $this->respondWithToken(auth()->refresh());
        } catch (Exception $e) {
            return response()->json([
                'errors' => [
                    $e->getMessage()
                ]
            ], 422);
        }
    }

    /**
     * @param string $token
     * @return array
     */
    protected function respondWithToken(string $token): array
    {
        return [
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ];
    }
}
