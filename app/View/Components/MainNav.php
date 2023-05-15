<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainNav extends Component
{
    public $r, $title;

    public function __construct($r = null, $title = null)
    {
        switch ($title) {
            case "question-reponse":
                $this->r = (object) [
                    'title' => 'question-reponse',
                    'index' => 'question-reponse.index',
                    'create' => 'question-reponse.create',
                    'confirm' => 'question-reponse.index',
                ];
                break;
            case "reponse":
                $this->r = (object) [
                    'title' => 'reponse',
                    'index' => 'reponse.index',
                    'create' => 'reponse.create',
                    'confirm' => 'reponse.index',
                ];
                break;
            case "question":
                $this->r = (object) [
                    'title' => 'question',
                    'index' => 'question.index',
                    'create' => 'question.create',
                ];
                break;
            case "chapitre":
                $this->r = (object) [
                    'title' => 'chapitre',
                    'index' => 'chapitre.index',
                    'create' => 'chapitre.create',
                ];
                break;
            case "module":
                $this->r = (object) [
                    'title' => 'module',
                    'index' => 'module.index',
                    'create' => 'module.create',
                ];
                break;
            case "users":
                $this->r = (object) [
                    'title' => 'users',
                    'index' => 'users.index',
                    'create' => 'users.create',
                ];
                break;
            case "quiz-generator":
                $this->r = (object) [
                    'title' => 'quiz-generator',
                    'index' => '',
                    'create' => '',
                ];
                break;
            default:
                $this->r = (object) [
                    'title' => '',
                    'index' => '',
                    'create' => '',
                    'confirm' => '',
                ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
   
    public function render(): View|Closure|string
    {
        return view('components.main-nav', [
            'r' => $this->r,
        ]);
    }
    
    

}
