<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Foundation\Configuration\Middleware;

class AuthAPI extends Authenticate
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->bearerToken();
    }

}