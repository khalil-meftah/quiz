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
        $user = User::all();
        return view('admin/index', compact('user'));
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
            'password' => ['required', 'confirmed'],
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
        $user->password = Hash::make($request->input('password')) ;
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
        
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'role' => ['required'],
            'password' => ['required', 'confirmed'],
            'status' => ['required']
        ]);
      
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=$request->password;
        $user->status=$request->status;
        
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
        $user=User::where('status',0)->get();
        return view('admin.confirmation',compact('user'));

    }

    public function validateUser($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->save();
        return redirect()->route('user.confirmation');
    }
}
