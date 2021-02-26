<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifyUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->getAttribute('is_admin')) {
            return $next($request);
        }

        return redirect('/');
    }
}
