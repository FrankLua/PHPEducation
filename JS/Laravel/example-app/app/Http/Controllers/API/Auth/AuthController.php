<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request as HttpRequest;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(PostService $postServ, UserService $userService)
    {
        $this->postService = $postServ;
        $this->userService = $userService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(HttpRequest $request)
    {
        $credentials = $request->validate([
            'password' => 'required|max:50|min:8',
            'email' => 'required|max:50|min:4'
        ]);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Register user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(HttpRequest $request)
    {
        $credentials = $request->validate([
            'password' => 'required|max:50|min:8',
            'email' => 'required|max:50|min:4',
            'name' => 'required|max:50|min:4',
        ]);

        $result = $this->userService->addOne($credentials);
        return response()->json(['id' => $result], 201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $response = auth()->user();
        return response()->json($response);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}