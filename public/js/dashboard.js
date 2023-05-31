

// make fake have the same width as sidenav

  document.addEventListener("DOMContentLoaded", function() {

    let moduleSelect = document.getElementById('module');
    let chapitreSelect = document.getElementById('chapitre');
    let questionInput = document.getElementById('question-input');
    // let generateQuiz = document.getElementById('generate-quiz');

    if(moduleSelect, chapitreSelect) {
    moduleSelect.addEventListener('change', function() {
        let module = this.value;
        if (module) {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("chapitre").disabled = false;
                    let chapitres = JSON.parse(xhr.responseText);
                    chapitreSelect.innerHTML = '<option value="">Sélectionnez le chapitre</option>';
                    chapitres.forEach(function(chapitre) {
                        let option = document.createElement('option');
                        option.value = chapitre.id;
                        option.text = chapitre.nomChapitre;
                        chapitreSelect.add(option);
                    });
                }
            };


            if (questionInput) {
              xhr.open('GET', '/question/' + module + '/chapitres/', true);
            }else{
              xhr.open('GET', '/question-reponse/' + module + '/chapitres', true);
            }
            xhr.send();
        } else {
            chapitreSelect.innerHTML = '<option value="">Sélectionnez le chapitre</option>';
            chapitreSelect.disabled = true;
        }
    });
  }

  });

