<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;



class reponseController extends Controller
{
    public function index()
    {
        return redirect()->route('question-reponse.index');
    }

    public function create(Request $request)
    {
        $question_id = $request->query('question_id');
        // Retrieve the question using the question ID
        $question = Question::find($question_id);
    
        // Pass the question to the create view
        return view('reponse.create', compact('question'));
        // return $request;
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
        $reponse->status = 'pending';
        $reponse->save();

        return redirect()->route('question-reponse.index');
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
    public function edit(Request $request, string $id)
    {
        $reponse = Reponse::find($id);
        $question = Question::find($request->question_id);
        return view('Reponse\edit',compact('reponse', 'question'));
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
        return redirect()->route('question-reponse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Reponse::destroy($id);
        return redirect()->route('question-reponse.index');
    }

    public function validateReponse(Request $request)
    {
        
        // $this->authorize('validate-reponse');
        
        $reponse = Reponse::find($request->reponse_id);
        $reponse->status = 'validated';
        // $reponse->validated_by = Auth::user()->id;
        $reponse->save();
    
        return redirect()->route('question-reponse.confirmation');
    }
}
