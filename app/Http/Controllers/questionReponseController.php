<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Chapitre;
use App\Models\Module;

use App\Http\Controllers\QuestionController;


class questionReponseController extends Controller
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
        $questions = Question::paginate(8);

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

    $approvalStatus = $request->input('approval_status', 'all'); 

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

    if ($approvalStatus === 'validated') {
        $query->where('status', 'validated')
            ->whereHas('reponses', function ($q) {
                $q->where('status', 'validated');
            });
    } elseif ($approvalStatus === 'pending') {
        $query->where(function ($q) {
            $q->where('status', 'pending')
                ->orWhereHas('reponses', function ($q2) {
                    $q2->where('status', 'pending');
                });
        });
    }    

    $questions = $query->paginate(8);

    foreach ($questions as $question) {
        $reponses = Reponse::where('question_id', $question->id)->get()->toArray();
        $question->reponses = $reponses;
    }

    return view('QuestionReponse\index', compact('questions', 'modules', 'chapitres'));
    
    }

    public function searchByChapForConfirmation(Request $request){
        $modules = Module::all();
        $chapitres = Chapitre::all();
    
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
        
        $query->where(function ($query) {
            $query->where('status', 'pending')
                ->orWhereHas('reponses', function ($query) {
                    $query->where('status', 'pending');
                });
        });

        $questions = $query->paginate(8);
    
        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)->get()->toArray();
            $question->reponses = $reponses;
        }

        return view('QuestionReponse\confirmation', compact('questions', 'modules', 'chapitres'));
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
     * used for confirmation.
     */
    
    public function show()
    {

        return $this->confirmationPage();
        
    }
    function confirmationPage(){
        $modules = Module::all();
        $chapitres = Chapitre::all();
        $questions = Question::where('status', 'pending')
            ->orWhere(function ($query) {
                $query->where('status', '!=', 'pending')
                    ->whereHas('reponses', function ($query) {
                        $query->where('status', 'pending');
                    });
            })
            ->paginate(8);
        
        foreach ($questions as $question) {
            $reponses = Reponse::where('question_id', $question->id)
                ->where('status', 'pending')
                ->get()
                ->toArray();
            $question->reponses = $reponses;
        }
        
        return view('QuestionReponse\confirmation', compact('questions', 'modules', 'chapitres'));
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

    public function validateAll()
    {
        $questions = Question::where('status', 'pending')->get();
    
        foreach ($questions as $question) {
    
            if ($question) {
                $reponses = Reponse::where('question_id', $question->id)
                    ->where('status', 'pending')
                    ->get();
    
                foreach ($reponses as $reponse) {
                    $reponse->status = 'validated';
                    $reponse->save();
                }
    
                $question->status = 'validated';
                $question->save();
            }
        }
    
        return redirect()->route('question-reponse.validation');
    }
    



}
