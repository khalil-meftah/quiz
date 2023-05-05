<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Chapitre;
use App\Models\Question;
use App\Models\Reponse;

use PDF;

use Illuminate\Http\Request;

class quizController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        $chapitres = Chapitre::all();

        return view('GenerateQuiz\index')->with('modules', $modules)->with('chapitres', $chapitres);
    }

    public function getChapitres($module_id)
    {
        $chapitres = Chapitre::where('module_id', $module_id)->get();
        return response()->json($chapitres);
    }

    public function generate(Request $request)
    {
        $questions = Question::where('chapitre_id', $request->chapitre)->inRandomOrder()->limit(20)->get();

        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)->get()->toArray();
            $question->reponses = $reponses;
        }
        
        // return quizController::index()->with('questions', $questions);
        // return $questions;

        $pdf = PDF::loadView('GenerateQuiz\quizPdf', compact('questions'));
        return $pdf->download('quiz.pdf');


    }
}