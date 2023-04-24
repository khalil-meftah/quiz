<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;


class reponseController extends Controller
{
    public function index()
    {
        $reponse = Reponse::all();
        return view('reponse\index')->with('reponse', $reponse);
    }

    public function create()
    {
        return view('reponse\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reponse = new Reponse();
        $reponse->descriptionReponse = $request->descriptionReponse;
        $reponse->valeurReponse = $request->valeurReponse;
        $reponse->id_question = $request->id_question;
        $reponse->save();
        return $this->index();
    }

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
        $reponse = Reponse::find($id);
        return view('Reponse\edit',compact('reponse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reponse = Reponse::find($id);
        $reponse->descriptionReponse = $request->descriptionReponse;
        $reponse->save();
        return redirect()->route('reponse.index', ['reponse' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Reponse::destroy($id);
        return redirect(route('reponse.index'));
    }
}
