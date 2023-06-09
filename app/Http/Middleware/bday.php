<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;


class bday
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $currentDate = date('m-d');
        $userDate = date('m-d', strtotime($user->dateDeNaissance));

        if ($currentDate === $userDate) {
            return $next($request);
        } else {
            return response()->view('404', [], 404);
        }
    }
}