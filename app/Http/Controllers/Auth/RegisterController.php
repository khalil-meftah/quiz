<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user())],
            'role'=> ['required'],
            'dateDeNaissance' => ['required', 'date', 'before_or_equal:today'],
            'numeroDeTelephone' => ['required', 'string', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'adresse'=>['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'name.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prénom est requis.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'role.required' => 'Le champ role est requis.',
            'dateDeNaissance.required' => 'Le champ date de naissance est requis.',
            'numeroDeTelephone.required' => 'Le champ numéro de téléphone est requis.',
            'numeroDeTelephone.regex' => 'Veuillez entrer un numéro de téléphone valide.',
            'adresse.required' => 'Le champ adresse est requis.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le champ mot de pass doit contenir au moins 8 caractères.',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'prenom'=>$data['prenom'],
            'email'=>$data['email'],
            'role'=>$data['role'],
            'dateDeNaissance'=>$data['dateDeNaissance'],
            'numeroDeTelephone'=>$data['numeroDeTelephone'],
            'adresse'=>$data['adresse'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
