<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Activite
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->status) {
            return $next($request);
        } else {
            return redirect()->route('pending');
        }
    }
}