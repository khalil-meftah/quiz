<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Question;



class reponseController extends Controller
{
    public function index()
    {
        $reponses = Reponse::paginate(10);
        return view('reponse\index')->with('reponses', $reponses);
    }

    public function create()
    {
        $questions = Question::all();
        return view('reponse\create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reponse = new Reponse();
        $reponse->descriptionReponse = $request->descriptionReponse;
        $reponse->valeurReponse = $request->valeurReponse;
        $reponse->question_id = $request->question_id;
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
        $questions = Question::all();
        return view('Reponse\edit',compact('reponse', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reponse = Reponse::find($id);
        $reponse->descriptionReponse = $request->descriptionReponse;
        $reponse->valeurReponse = $request->valeurReponse;
        $reponse->question_id = $request->question_id;
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
