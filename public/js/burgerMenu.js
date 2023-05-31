document.addEventListener("DOMContentLoaded", function() {
  const logo1 = document.getElementById('logo1');
  const logo2 = document.getElementById('logo2');
  const sidenav = document.querySelector('.sidenav');
  const button = document.getElementById('burger-btn');
  const fake = document.getElementById('fake');

  // Retrieve the side nav state from localStorage
  const isSideNavSmall = localStorage.getItem('isSideNavSmall') === 'true';


  fake.style.width = "220px";
  // Set the initial state of the side nav based on the stored value
  if (isSideNavSmall) {
    button.classList.add('open');
    sidenav.classList.add('small-nav');
    logo1.classList.add('logo1-hidden');
    logo2.classList.add('logo2-shown');
    fake.style.width = "80px";
  }

  if (logo1 && logo2 && sidenav && button) {
    button.addEventListener('click', () => {
      button.classList.toggle('open');
      sidenav.classList.toggle('small-nav');
      logo1.classList.toggle('logo1-hidden');
      logo2.classList.toggle('logo2-shown');

      if (fake.style.width === "80px") {
        fake.style.width = "220px";
      } else {
        fake.style.width = "80px";
      }
      // Store the current state of the side nav in localStorage
      const isSideNavSmall = sidenav.classList.contains('small-nav');
      localStorage.setItem('isSideNavSmall', isSideNavSmall.toString());
    });
  }
});
