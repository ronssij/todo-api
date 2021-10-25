<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ErrorCodes;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login']]);
    }

    /**
     * Authenticate user using username and password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'email'],
            'password' => 'required',
        ]);

        $user = User::where('email', $data['username'])
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['The provided email does not exist.'],
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->userAgent());
        $user->withAccessToken($token->accessToken);

        return response()->json([
            'access_token' => $token->plainTextToken,
            'user' => $user
        ]);
    }

     /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
