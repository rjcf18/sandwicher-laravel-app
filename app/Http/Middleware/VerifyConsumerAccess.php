<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyConsumerAccess
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('accessToken');

        if (empty($token)) {
            return redirect('/')
                ->with('message','Access denied to register order for the meal. Token is missing.');
        }

        if (!User::accessTokenMatches($token)) {
            return redirect('/')
                ->with('message','Access denied to register order for the meal. Please specify a correct token.');
        }

        /** @var User $user */
        $user = User::query()->where('access_token', '=', $token)->first();

        if (!$user->getAttribute('is_admin') && User::accessTokenMatches($token)) {
            Auth::login($user);

            return $next($request);
        }

        return redirect('/');
    }
}
