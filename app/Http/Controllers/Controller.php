<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $user, $statusCode = 200)
    {
        return response()->json(['data' => [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => now()->addMinutes(config('jwt.ttl')),
            'user' => $user
        ]], $statusCode)->header('Authorization', $token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($errorCode, $statusCode = 400)
    {
        return response()->json([
            'message' => ErrorCodes::getDescription($errorCode),
            'error_code' => $errorCode,
        ], $statusCode);
    }
}
