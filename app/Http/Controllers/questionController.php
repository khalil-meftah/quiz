<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Chapitre;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class questionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapitres = Chapitre::all();
        $modules = Module::all();
        return view('Question\create', compact('chapitres', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descriptionQuestion' => 'required',
            'chapitre' => 'required',
        ]);
        $question = new Question();
        $question->descriptionQuestion = $request->descriptionQuestion;
        $question->chapitre_id = $request->chapitre;
        $question->status = 'pending';
        $question->save();
        return redirect()->route('question-reponse.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $questionWithResponses = Question::with('reponses')->find($id);
    //     return view('Question\show', compact('questionWithResponses'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        $chapitres = Chapitre::all();
        // $modules = Module::all();

        $oldChapitre = Chapitre::find($question->chapitre_id);
        // $oldModule = Module::find($oldChapitre->module_id);
        return view('Question\edit',compact('question', 'chapitres', 'oldChapitre'));
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
        return redirect()->route('question.index');
    }

    public function validateQuestion(Request $request)
    {
        
        $question = Question::find($request->question_id);

        $question->status = 'validated';
        // $question->validated_by = Auth::user()->id;
        $question->save();
        
        // foreach ($question->reponses as $reponse) {
        //     $reponse->status = 'validated';
        //     $reponse->validated_by = Auth::user()->id;
        //     $reponse->save();
        // }

        // $question->isApproved();
        // $question->save();
            // return $request;
    
        return redirect()->route('question-reponse.validation');
    }
}
