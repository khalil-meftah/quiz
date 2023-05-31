<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'dateDeNaissance' => ['required'],
            'numeroDeTelephone' => ['required', 'string', 'max:10'],
            'adresse'=>['required'],
            'password' => ['confirmed'],
            'status'=>'required'
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'dateDeNaissance' => ['required'],
            'numeroDeTelephone' => ['required', 'string', 'max:10'],
            'adresse'=>['required'],
            'password' => ['confirmed'],
            'status'=>'required'
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
