<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class manageUser extends Controller
{
    public function __construct()
{
    $this->middleware('auth')->only('index');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = User::all();
        return view('admin/index', compact('user'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'password' => ['required', 'confirmed']
        ]);
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->dateDeNaissance=$request->dateDeNaissance;
        $user->numeroDeTelephone=$request->numeroDeTelephone;
        $user->adresse=$request->adresse;
        $user->password = Hash::make($request->input('password')) ;
           $user->save();
    return redirect('/user');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view ('admin.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $request->validate([
        
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'role' => ['required'],
            'password' => ['required', 'confirmed']
        ]);
      
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=$request->password;
        
        $user->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
