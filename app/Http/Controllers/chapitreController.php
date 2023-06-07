<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapitre;
use App\Models\Module;
use PhpParser\Node\Expr\AssignOp\Mod;

class chapitreController extends Controller
{
    
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        $this->middleware('Activite');
        
    }
    public function index()
    {
        $chapitres = Chapitre::paginate(8);

        foreach ($chapitres as $chapitre) {
            $module = Module::find($chapitre->module_id);
            $chapitre->module = $module;
        }

        // return $chapitres;
        return view('Chapitre\index', compact('chapitres'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('Chapitre\create', compact('modules')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chapitre = new Chapitre();

        $request->validate([
            'nomChapitre'=>['required','filled','min:3'],
            'nombreHeuresChapitre' => ['filled'],
            'dateDebutChapitre' =>['required'],
            'module_id' => ['filled']
        ],[
            'nomChapitre.filled'=>'Le champ nom chapitre doit avoir une valeur.',
            'nombreHeuresChapitre.filled'=>'Le champ nombre heures chapitre doit avoir une valeur.',
            'dateDebutChap' =>'Le champ date debut chapitre est obligatoire.',
            'module_id.filled' => 'Le champ module est obligatoire.'
        ]);
       $chapitre->nomChapitre = $request->nomChapitre;
       $chapitre->descriptionChapitre = $request->descriptionChapitre;
       $chapitre->nombreHeuresChapitre = $request->nombreHeuresChapitre;
       $chapitre->dateDebutChapitre = $request->dateDebutChapitre;
       $chapitre->module_id = $request->module_id;
       $chapitre -> save();
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
        $chapitre=Chapitre::find($id);
        $modules = Module::all();
        
        return view ('Chapitre\edit', compact('chapitre','modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chapitre = Chapitre::find($id);
        $request->validate([
            'nomChapitre'=>['filled','min:3'],
            'nombreHeuresChapitre' => ['filled'],
            'dateDebutChapitre' =>['required'],
            'module_id' => ['filled']

        ],[
            'nomChapitre.filled'=>'Le champ nom chapitre doit avoir une valeur.',
            'nombreHeuresChapitre.filled'=>'Le champ nombre heures chapitre doit avoir une valeur.',
            'dateDebutChap' =>'Le champ date debut chapitre est obligatoire.',
            'module_id.filled' => 'Le champ module est obligatoire.'
        ]);
        $chapitre->nomChapitre = $request->nomChapitre;
        $chapitre->descriptionChapitre = $request->descriptionChapitre;
        $chapitre->nombreHeuresChapitre = $request->nombreHeuresChapitre;
        $chapitre->dateDebutChapitre = $request->dateDebutChapitre;
        $chapitre->module_id = $request->module_id;
        $chapitre -> save();
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
