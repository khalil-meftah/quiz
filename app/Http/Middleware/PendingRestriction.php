<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendingRestriction
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->status == 1) {
            return redirect('/question-reponse');
        }

        return $next($request);
    }
}

