<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller


{
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        $this->middleware('Activite');
        
    }
 public function edit()
        {
            $user = auth()->user();
            return view('user.edit', ['user' => $user]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request)
        {
            $id = $request->input('id');
            $user = User::find($id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
                'role'=> ['required'],
                'dateDeNaissance' => ['required'],
                'numeroDeTelephone' => ['required', 'string', ' max:10'],
                'adresse'=>['required'],
                'password' => ['confirmed'],
                
            ]);
            $user->name=$request->name;
            $user->prenom=$request->prenom;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->dateDeNaissance=$request->dateDeNaissance;
            $user->numeroDeTelephone=$request->numeroDeTelephone;
            $user->adresse=$request->adresse;

            if ($request->input('password')){
                $user->password = Hash::make($request->input('password')) ;
            }
            $user->save();
            $user = User::find($id);
            if ($request->user()->isDirty('email')) {
                         $request->user()->email_verified_at = null;
                     }
        
            return redirect('profile/membre');
        }
        
      


    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
         return redirect()->route('register');
    }
    
}
