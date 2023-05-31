<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainNav extends Component
{
    public $r, $title, $userRole;

    public function __construct($r = null, $title = null, $userRole = null)
    {
        $this->title = $title;
        $this->userRole = $userRole;

        switch ($title) {
            case "question-reponse":
                $this->r = (object) [
                    'title' => 'question-reponse',
                    'index' => 'question-reponse.index',
                    'create' => 'question-reponse.create',
                    'confirm' => 'question-reponse.validation',
                ];
                break;
            case "reponse":
                $this->r = (object) [
                    'title' => 'reponse',
                    'index' => 'reponse.index',
                    'create' => 'question.create',
                    'confirm' => 'question-reponse.validation',
                ];
                break;
            case "question":
                $this->r = (object) [
                    'title' => 'question',
                    'index' => 'question.index',
                    'create' => 'question.create',
                    'confirm' => 'question-reponse.validation',
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
            case "user":
                $this->r = (object) [
                    'title' => 'user',
                    'index' => 'user.index',
                    'create' => 'user.create',
                    'confirm' => 'user.confirmation',
                ];
                break;
            case "quiz-generator":
                $this->r = (object) [
                    'title' => 'quiz-generator',
                    'index' => null,
                    'create' => null,
                ];
                break;
            case "profile":
                $this->r = (object) [
                    'title' => 'profile',
                    'index' => 'profile.index',
                    'create' => null,
                ];
                break;
            default:
                $this->r = (object) [
                    'title' => null,
                    'index' => null,
                    'create' => null,
                    'confirm' => null,
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
            'userRole' => $this->userRole,
            'title' => $this->title,
        ]);
    }
    
    

}
