<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = config('app.public_basic_auth_user', 'plo');
        $pass = config('app.public_basic_auth_pass', 'plo-public-access');

        if ($request->getUser() !== $user || $request->getPassword() !== $pass) {
            return response('Unauthorized', 401, [
                'WWW-Authenticate' => 'Basic realm="Public Access"',
            ]);
        }

        return $next($request);
    }
}
