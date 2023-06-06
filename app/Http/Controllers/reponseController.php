<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;



class reponseController extends Controller
{
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        $this->middleware('Activite');
        
    }
    public function index()
    {
        return redirect()->route('question-reponse.index');
    }

    public function create(Request $request)
    {
        // if($request){
        //     $id = $request->query('question_id');
        // }
        // if($question_id){
        //     $id = $question_id;
        // }

        // $question = Question::find($id);
        $question_id = session('question_id');

        return view('reponse.create', compact('question_id'));
        // return $question_id;
        // return $request;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descriptionReponse' => ['required'],
            'valeurReponse' => 'required',
            'question_id' => ['required', 'exists:questions,id'],
        ], [
            'descriptionReponse.required' => 'Le champ de réponse de la description est obligatoire.',
            'valeurReponse.required' => 'Le champ valeur réponse est obligatoire.',
            'question_id.required' => 'Le champ d\'identification de la question est obligatoire.',
            'question_id.exists' => 'La question sélectionnée est invalide.',
        ]);
        $reponse = new Reponse();
        $reponse->descriptionReponse = $request->descriptionReponse;
        $reponse->valeurReponse = $request->valeurReponse;
        $reponse->question_id = $request->question_id;
        $reponse->status = 'pending';
        $reponse->save();

        return redirect()->route('reponse.create')->with('question_id', $request->question_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('question-reponse.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
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
        $request->validate([
            'descriptionReponse' => ['required'],
            'valeurReponse' => 'required',
            'question_id' => ['required', 'exists:questions,id'],
        ], [
            'descriptionReponse.required' => 'Le champ de réponse de la description est obligatoire.',
            'valeurReponse.required' => 'Le champ valeur réponse est obligatoire.',
            'question_id.required' => 'Le champ d\'identification de la question est obligatoire.',
            'question_id.exists' => 'La question sélectionnée est invalide.',
        ]);
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
    
        return redirect()->route('question-reponse.validation');
    }
}
