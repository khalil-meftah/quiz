<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chapitre;
class chapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $chap = chapitre::all();
      //chapitre is the view chapitre.blade
    //compact is the auto table that contains the variables of chapitres
      return view('Chapitre\index' , compact('chap'));
    }

    public function create()
    {
        return view('Chapitre\create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chap = new Chapitre();

        $request->validate([
            'nomChapitre'=>['filled','min:3'],
            'descriptionChapitre'=>['min:08'],
            'nombreHeuresChapitre' => ['filled',],
            'dateDebutChapitre' =>['required_with:dateCreationChapitre'],
             'dateCreationChapitre' => ['before:dateDebutChapitre']
        ],[
            //
            // desription const
            'descriptionChapitre'=>'Le champ description chapitre doit comporter au moins 08 caractères.',
            // nombre heures const 
            'nombreHeuresChapitre.filled'=>'Le champ nombre heures chapitre doit avoir une valeur.',
            
            // date creation const
            'dateCreationChapitre'=>'Le champ date creation chapitre doit être une date avant date debut chapitre.',
            
            //date debut const
            'dateDebutChap.required_with' =>'Le champ date debut chapitre est obligatoire lorsque date creation chapitre est présent.'
        ]);
       $chap->nomChapitre = $request->nomChapitre;
       $chap->descriptionChapitre = $request->descriptionChapitre;
       $chap->nombreHeuresChapitre = $request->nombreHeuresChapitre;
       $chap->dateDebutChapitre = $request->dateDebutChapitre;
       $chap->dateCreationChapitre = $request->dateCreationChapitre;
       $chap->module_id = $request->module_id;
       $chap -> save();
        return redirect('/chapitre');
    }

    
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $f=Chapitre::find($id);
        return view ('Chapitre\edit',['chap'=>$f]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $f=Chapitre::find($id);
        $request->validate([
            'nomChapitre'=>['filled','min:3'],
            'descriptionChapitre'=>['min:08'],
            'nombreHeuresChapitre' => ['filled',],
            'dateDebutChapitre' =>['required_with:dateCreationChapitre'],
            'dateCreationChapitre' => ['before:dateDebutChapitre']
        ],[
            // desription const
            'descriptionChapitre'=>'Le champ description chapitre doit comporter au moins 08 caractères.',
            // nombre heures const 
            'nombreHeuresChapitre.filled'=>'Le champ nombre heures chapitre doit avoir une valeur.',
            // date creation const
            'dateCreationChapitre'=>'Le champ date creation chapitre doit être une date avant date debut chapitre.',
            //date debut const
            'dateDebutChap.required_with' =>'Le champ date debut chapitre est obligatoire lorsque date creation chapitre est présent.'
        ]);
        $f->nomChapitre = $request->nomChapitre;
        $f->descriptionChapitre = $request->descriptionChapitre;
        $f->nombreHeuresChapitre = $request->nombreHeuresChapitre;
        $f->dateDebutChapitre = $request->dateDebutChapitre;
        $f->dateCreationChapitre = $request->dateCreationChapitre; 
        $f->module_id = $request->module_id;
        $f -> save();
        return redirect ('/chapitre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $f=Chapitre::find($id);
        $f->delete();
        return redirect('/chapitre');
    }
}
