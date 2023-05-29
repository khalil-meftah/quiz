

// make fake have the same width as sidenav

  document.addEventListener("DOMContentLoaded", function() {

    let moduleSelect = document.getElementById('module');
    let chapitreSelect = document.getElementById('chapitre');
    let questionInput = document.getElementById('question-input');
    let questionInputUpdate = document.getElementById('question-input-update');


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
              xhr.open('GET', '/question/' + module + '/chapitres/' + questionInput.value, true);
            }else{
              xhr.open('GET', '/question-reponse/' + module + '/chapitres', true);
            }
            xhr.send();
        } else {
            chapitreSelect.innerHTML = '';
        }
    });
  }

    const logo1 = document.getElementById('logo1');
    const logo2 = document.getElementById('logo2');
    const sidenav = document.querySelector('.sidenav');
    const button = document.getElementById('burger-btn');
    const mainNav = document.getElementById('main-nav');


  if(logo1, logo2, sidenav, button, mainNav) {
  button.addEventListener('click', () => {
      button.classList.toggle('open');
      sidenav.classList.toggle('small-nav');
      logo1.classList.toggle('logo1-hidden');
      logo2.classList.toggle('logo2-shown');
  });
  }

  const fake = document.getElementById('fake');
  const burgerBtn = document.getElementById('burger-btn');
  if(fake, burgerBtn){
    fake.style.width = "220px";

    burgerBtn.addEventListener('click', function() {
        if (fake.style.width === "80px") {
          fake.style.width = "220px";
        } else {
          fake.style.width = "80px";
        }
      });
  }

      let visibilityBtn = document.querySelector('#visibility-btn');
      let visibilityBtnSpan = document.querySelector('#visibility-btn-span');
      let reponses = document.querySelectorAll('#reponse');
      let questions = document.querySelectorAll('#question');
      let showEye = document.querySelector('#show-eye');
      let hideEye = document.querySelector('#hide-eye');

      if(visibilityBtn, visibilityBtnSpan, reponses, questions, showEye, hideEye) {
        hideEye.style.display = "none";
        for (let i = 0; i < reponses.length; i++) {
          reponses[i].style.display = "none";
        }
        for (let i = 0; i < questions.length; i++) {
          questions[i].addEventListener('click', function() {
          if (reponses[i].style.display === "none") {
            reponses[i].style.display = "block";
          } else {
            reponses[i].style.display = "none";
          }
        });
        }
      
        visibilityBtn.addEventListener('click', function() {
          if (visibilityBtn.value === "on") {
            for (let i = 0; i < reponses.length; i++) {
              reponses[i].style.display = "block";
            }
            visibilityBtn.value = "off";
            visibilityBtnSpan.innerHTML = "Cacher tout";
            showEye.style.display = "none";
            hideEye.style.display = "block";
          } else if (visibilityBtn.value === "off"){
            for (let i = 0; i < reponses.length; i++) {
              reponses[i].style.display = "none";
            }
            visibilityBtn.value = "on";
            visibilityBtnSpan.innerHTML = "Afficher tout";
            showEye.style.display = "block";
            hideEye.style.display = "none";
          }
        }); 
      }




  });

