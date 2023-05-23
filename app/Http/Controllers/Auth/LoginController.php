<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\User;

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
        $user = auth()->user();
        
        if ($user->status == 0) {
            return redirect('/pending');
        } else {
            return redirect('/home');
        }
    } else {
        return redirect('/login')
            ->with('error', 'Email ou mot de passe incorrect');
    }
}

    
}
