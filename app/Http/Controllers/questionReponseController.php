<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Chapitre;
use App\Models\Module;

class questionReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();
        $chapitres = Chapitre::all();
        $questions = Question::paginate(9);

        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)->get()->toArray();
            $question->reponses = $reponses;
        }

        return view('QuestionReponse\index', compact('questions', 'modules', 'chapitres'));

    }
    public function getChapitres($module_id)
    {

        $chapitres = Chapitre::where('module_id', $module_id)->get();
        return response()->json($chapitres);
    }
    // public function searchForm(){

    //     $modules = Module::all();
    //     $chapitres = Chapitre::all();

    //     return view('QuestionReponse\index')->with('modules', $modules)->with('chapitres', $chapitres);

    // }

    public function searchByChap(Request $request){

        $modules = Module::all();
        $chapitres = Chapitre::all();

        if($request->chapitre == null){
            $questions = Question::paginate(9);
        }else{
            $questions = Question::where('chapitre_id', $request->chapitre)->paginate(9);
        }

        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)->get()->toArray();
            $question->reponses = $reponses;
        }

        return view('QuestionReponse\index', compact('questions', 'modules', 'chapitres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('question.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('question.destroy', $id);
    }
}
