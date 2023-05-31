

document.addEventListener("DOMContentLoaded", function() {

    let questionReponseSection = document.getElementById('section-question-reponse');
    let chapitreSection = document.getElementById('section-chapitre');
    let moduleSection = document.getElementById('section-module');
    let userSection = document.getElementById('section-user');
    let generateQuizSection = document.getElementById('section-quiz-generator');
    let profileSection = document.getElementById('section-profile');

    let questionReponseDiv = document.getElementById('question-reponse-div');
    let chapitreDiv = document.getElementById('chapitre-div');
    let moduleDiv = document.getElementById('module-div');
    let userDiv = document.getElementById('user-div');
    let generateQuizDiv = document.getElementById('quiz-generator-div');
    let profileDiv = document.getElementById('profile-div');
    
    if(questionReponseDiv){
        questionReponseSection.classList.add('chosen-section');
    }
    if(chapitreDiv){
        chapitreSection.classList.add('chosen-section');
    }
    if(moduleDiv){
        moduleSection.classList.add('chosen-section');
    }
    if(userDiv){
        userSection.classList.add('chosen-section');
    }
    if(generateQuizDiv){
        generateQuizSection.classList.add('chosen-section');
    }
    if(profileDiv){
        profileSection.classList.add('chosen-section');
    }

    




});