<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $question = Question::all();
        return view('Question\index')->with('question', $question);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Question\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->descriptionQuestion = $request->descriptionQuestion;
        $question->chapitre_id = $request->chapitre_id;
        $question->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questionWithResponses = Question::with('responses')->find($id);
        return view('Question\show', compact('questionWithResponses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        return view('Question\edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::find($id);
        $question->descriptionQuestion = $request->descriptionQuestion;
        $question->chapitre_id = $request->chapitre_id;
        $question->save();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::destroy($id);
        return redirect(route('question.index'));
    }
}
