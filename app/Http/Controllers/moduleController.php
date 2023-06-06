<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\module;
class moduleController extends Controller
{   
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        $this->middleware('Activite');
        
    }
    public function index()
    {
        $modules = Module::paginate(8);

        return view('module/index' , compact('modules'));
    }

    public function create()
    {
        return view('module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mod = new Module ();
        $request->validate([
            'nomModule'=>['filled','min:3','unique:modules'],
            'nombreHeuresModule' => ['filled'],
            'dateDebutModule' =>['required'],
        ],[
            'nomModule.unique'=>'le nom de module a déja été pris',
            'nomModule.filled'=>'Le champ nom module doit avoir une valeur.',
            'nombreHeuresModule.filled'=>'Le champ nombre heures Module doit avoir une valeur.',
            'dateDebutModule' =>'Le champ date debut Module est obligatoire.'
        ]
    ); 
        $mod->nomModule = $request->nomModule;
        $mod->descriptionModule = $request->descriptionModule;
        $mod->nombreHeuresModule = $request->nombreHeuresModule;
        $mod->dateDebutModule = $request->dateDebutModule;
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
        return view ('module.edit',['mod'=>$mod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mod=Module::find($id);
        
        $request->validate([
            'nomModule'=>['filled','min:3','unique:modules'],
            'nombreHeuresModule' => ['filled'],
            'dateDebutModule' =>['required'],
        ],[
            'nomModule.unique'=>'le nom de module a déja été pris',
            'nomModule.filled'=>'le nom du module doit être avoir une valeur.',
            'nombreHeuresModule.filled'=>'Le champ nombre heures Module doit avoir une valeur.',
            'dateDebutModule' =>'Le champ date debut Module est obligatoire.'
        ]);

        $mod->nomModule = $request->nomModule;
        $mod->descriptionModule = $request->descriptionModule;
        $mod->nombreHeuresModule = $request->nombreHeuresModule;
        $mod->dateDebutModule = $request->dateDebutModule;
        $mod -> save();
        return redirect ('module');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mod=Module::find($id);
        $mod->delete();
        return redirect('/module');
    }
}