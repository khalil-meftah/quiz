  // extra element visibility

  document.addEventListener("DOMContentLoaded", function() {


  let visibilityBtn = document.querySelector('#visibility-btn');
  let visibilityBtnSpan = document.querySelector('#visibility-btn-span');
  let children = document.querySelectorAll('#child');
  let parents = document.querySelectorAll('#parent');
  let showEye = document.querySelector('#show-eye');
  let hideEye = document.querySelector('#hide-eye');

  if(visibilityBtn, visibilityBtnSpan, children, parents, showEye, hideEye) {
    hideEye.style.display = "none";
    for (let i = 0; i < children.length; i++) {
      children[i].style.display = "none";
    }
    for (let i = 0; i < parents.length; i++) {
      parents[i].addEventListener('click', function() {
      if (children[i].style.display === "none") {
        children[i].style.display = "block";
      } else {
        children[i].style.display = "none";
      }
    });
    }
  
    visibilityBtn.addEventListener('click', function() {
      if (visibilityBtn.value === "on") {
        for (let i = 0; i < children.length; i++) {
          children[i].style.display = "block";
        }
        visibilityBtn.value = "off";
        visibilityBtnSpan.innerHTML = "Cacher tout";
        showEye.style.display = "none";
        hideEye.style.display = "block";
      } else if (visibilityBtn.value === "off"){
        for (let i = 0; i < children.length; i++) {
          children[i].style.display = "none";
        }
        visibilityBtn.value = "on";
        visibilityBtnSpan.innerHTML = "Afficher tout";
        showEye.style.display = "block";
        hideEye.style.display = "none";
      }
    }); 
  }
});
