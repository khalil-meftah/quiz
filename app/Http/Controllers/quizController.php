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
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        $this->middleware('Activite');
        
    }
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
        $data = $request;
        $module = $request->input('module');
        $chapitre = $request->input('chapitre');
        
        $query = Question::query();
        
        if (!empty($chapitre)) {
            $query->where('chapitre_id', $chapitre);
        } elseif (!empty($module)) {
            $query->whereHas('chapitre', function ($query) use ($module) {
                $query->where('module_id', $module);
            });
        }
        
        $questions = $query->where('status', 'validated')->inRandomOrder()->limit(20)->get();
        
        if ($questions->isEmpty() && !empty($module)) {
            $moduleQuestions = Question::whereHas('chapitre', function ($query) use ($module) {
                $query->where('module_id', $module);
            })->inRandomOrder()->limit(20)->get();
        
            $questions = $moduleQuestions;
        }
        
        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)
                ->where('status', 'validated')
                ->get()
                ->toArray();
            $question->reponses = $reponses;
        }
        
        $moduleTitle = '';
        $chapitreTitle = '';
        
        if (!empty($chapitre)) {
            $chapitre = Chapitre::findOrFail($chapitre);
            $chapitreTitle = $chapitre->nomChapitre;
            $moduleTitle = $chapitre->module->nomModule;
        } elseif (!empty($module)) {
            $module = Module::findOrFail($module);
            $moduleTitle = $module->nomModule;
        }
        
        $fileName = '';
        
        if (!empty($moduleTitle) && !empty($chapitreTitle)) {
            $fileName = $moduleTitle . '_' . $chapitreTitle . '.pdf';
        } elseif (!empty($moduleTitle)) {
            $fileName = $moduleTitle . '.pdf';
        } else {
            $fileName = 'quiz.pdf';
        }
        
        $pdf = PDF::loadView('GenerateQuiz\quizPdf', compact('questions', 'data'));
        // $pdf = PDF::loadView('GenerateQuiz\correctionPdf', compact('questions', 'data'));
        
        // return $pdf->download($fileName);
        return $pdf->stream($fileName);
        // return $data;
        // return view('GenerateQuiz\quizPdf', compact('questions', 'data'));

    }
}