<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\module;
class moduleController extends Controller
{
    public function index()
    {
        $mod = module::all();
        //module is the view module.blade
        //compact is the auto table that contains the variables of modules
        return view('module/module' , compact('mod'));
    }

    public function create()
    {
        return view('module.createMod');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mod = new module ();
        $request->validate([
            'nomModule'=>['filled','min:3'],
            'descriptionModule'=>['min:08'],
            'nombreHeuresModule' => ['filled',],
            'dateDebutModule' =>['required_with:dateCreationModule'],
            'dateCreationModule' => ['before:dateDebutModule']
        ],[
        // desription const
        'descriptionModule'=>'Le champ description Module doit comporter au moins 08 caractères.',
        // nombre heures const 
        'nombreHeuresModule.filled'=>'Le champ nombre heures Module doit avoir une valeur.',
        
        // date creation const
        'dateCreationModule'=>'Le champ date creation Module doit être une date avant date debut Module.',
        
        //date debut const
        'dateDebutMod.required_with' =>'Le champ date debut Module est obligatoire lorsque date creation Module est présent.']
    ); 
        $mod->nomModule = $request->nomModule;
        $mod->descriptionModule = $request->descriptionModule;
        $mod->nombreHeuresModule = $request->nombreHeuresModule;
        $mod->dateDebutModule = $request->dateDebutModule;
        $mod->dateCreationModule = $request->dateCreationModule;
    $mod->save();
return redirect('module');}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mod=Module::find($id);
        return view ('module.editMod',['mod'=>$mod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mod=Module::find($id);
        
        $request->validate([
            'nomModule'=>['filled','min:3'],
            'descriptionModule'=>['min:08'],
            'nombreHeuresModule' => ['filled',],
            'dateDebutModule' =>['required_with:dateCreationModule'],
            'dateCreationModule' => ['before:dateDebutModule']
        ],[
        // desription const
        'descriptionModule'=>'Le champ description Module doit comporter au moins 08 caractères.',
        // nombre heures const 
        'nombreHeuresModule.filled'=>'Le champ nombre heures Module doit avoir une valeur.',
        
        // date creation const
        'dateCreationModule'=>'Le champ date creation Module doit être une date avant date debut Module.',
        
        //date debut const
        'dateDebutMod.required_with' =>'Le champ date debut Module est obligatoire lorsque date creation Module est présent.']);
        $mod->nomModule = $request->nomModule;
        $mod->descriptionModule = $request->descriptionModule;
        $mod->nombreHeuresModule = $request->nombreHeuresModule;
        $mod->dateDebutModule = $request->dateDebutModule;
        $mod->dateCreationModule = $request->dateCreationModule;
        $mod -> save();
        return redirect ('module');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mod=module::find($id);
        $mod->delete();
return redirect('/module');
    }
}
