<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
{
    $input = $request->all();
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
        if (auth()->user()->role == 'professeur') {
            return view('home');
        } else if (auth()->user()->role == 'mainteneur') {
            return view('home');
        } else if (auth()->user()->role == 'administrateur') {
            return view('home');
        } else {
            return redirect('/')->with('status', 'Vous êtes connecté.');
        }
    } else {
        return redirect('/login')
            ->with('error', 'Email ou mot de passe incorrect');
    }
}

    
}
