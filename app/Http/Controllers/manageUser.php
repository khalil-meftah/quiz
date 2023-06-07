<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class manageUser extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'UserAccess:administrateur']);
    }
    
    public function index()
    {
        $users = User::paginate(8);
        return view('admin/index', compact('users'));
        // return $users;
    }
    
    public function create()
    {
       return view('admin.create');
    }

    public function store(Request $request)
    {
     $user = new User();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user())],
            'role'=> ['required'],
            'dateDeNaissance' => ['required', 'date', 'before_or_equal:today'],
            'numeroDeTelephone' => ['required', 'string', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'adresse'=>['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'status'=>'required'
        ],[
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
            'status.required' => 'Le champ statut est requis.',
        ]);
            
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->dateDeNaissance=$request->dateDeNaissance;
        $user->numeroDeTelephone=$request->numeroDeTelephone;
        $user->adresse=$request->adresse;
        $user->status=$request->status;

        if ($request->input('password')){
            $user->password = Hash::make($request->input('password')) ;
        }
        $user->save();
    return redirect('admin/user');

    }

   
    public function edit(string $id)
    {
        $user=User::find($id);
        return view ('admin.edit',['user'=>$user]);
    }

    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user())],
            'dateDeNaissance' => ['required', 'date', 'before_or_equal:today'],
            'numeroDeTelephone' => ['required', 'string', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'adresse'=>['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'status'=>'required'
        ], [
            'name.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prénom est requis.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'dateDeNaissance.required' => 'Le champ date de naissance est requis.',
            'numeroDeTelephone.required' => 'Le champ numéro de téléphone est requis.',
            'numeroDeTelephone.regex' => 'Veuillez entrer un numéro de téléphone valide.',
            'adresse.required' => 'Le champ adresse est requis.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le champ mot de pass doit contenir au moins 8 caractères.',
            'status.required' => 'Le champ statut est requis.',
        ]);
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->dateDeNaissance=$request->dateDeNaissance;
        $user->numeroDeTelephone=$request->numeroDeTelephone;
        $user->adresse=$request->adresse;
        $user->status=$request->status;

        if ($request->input('password')){
            $user->password = Hash::make($request->input('password')) ;
        }
        $user->save();
        $user = User::findOrFail($id);
        return redirect('admin/user');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user');
    }

    public function show(){
        return $this->confirmationPage();
    }
    public function confirmationPage(){
        $users=User::where('status',0)->paginate(8);
        return view('admin.confirmation',compact('users'));
    }

    public function validateUser($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->save();
        return redirect()->route('user.confirmation');
    }
}
