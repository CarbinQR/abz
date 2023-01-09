<?php

namespace App\Http\Middleware;

use App\Exceptions\ExpiredTokenException;
use Closure;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;

class RegistrationTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $tokenRepository = new TokenRepository();

        if ($request->get('token')) {
            $token = $tokenRepository->find($request->get('token'));

            if (!$token) {
                throw new ExpiredTokenException();
            }

            if (strtotime($token->expires_at) < strtotime(now())) {
                throw new ExpiredTokenException();
            }

            $token->revoke();
            $token->delete();
        } else {
            throw new ExpiredTokenException();
        }

        return $next($request);
    }
}
