<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Activite;
use  App\Http\Middleware\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'professeur') {
            return redirect('/question-reponse');
        } else if (auth()->user()->role == 'mainteneur') {
            return redirect('/question-reponse');
        } else if (auth()->user()->role == 'administrateur') {
            return redirect('/question-reponse');
        } else {
            return redirect('/question-reponse');
        }
    }
}
