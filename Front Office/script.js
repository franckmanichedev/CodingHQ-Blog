'use strict';

// navbar variables
const nav = document.querySelector('.mobile-nav');
const navMenuBtn = document.querySelector('.nav-menu-btn');
const navCloseBtn = document.querySelector('.nav-close-btn');


// navToggle function
const navToggleFunc = function () { nav.classList.toggle('active'); }

navMenuBtn.addEventListener('click', navToggleFunc);
navCloseBtn.addEventListener('click', navToggleFunc);



// theme toggle variables
const themeBtn = document.querySelectorAll('.theme-btn');


for (let i = 0; i < themeBtn.length; i++) {

  themeBtn[i].addEventListener('click', function () {

    // toggle `light-theme` & `dark-theme` class from `body`
    // when clicked `theme-btn`
    document.body.classList.toggle('light-theme');
    document.body.classList.toggle('dark-theme');

    for (let i = 0; i < themeBtn.length; i++) {

      // When the `theme-btn` is clicked,
      // it toggles classes between `light` & `dark` for all `theme-btn`.
      themeBtn[i].classList.toggle('light');
      themeBtn[i].classList.toggle('dark');

    }

  })

}

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.like').forEach(function(button) {
      button.addEventListener('click', function(event) {
          event.preventDefault();
          var articleId = this.getAttribute('data-id');
          fetch('like.php?id=' + articleId)
              .then(response => response.text())
              .then(data => {
                  if (data === 'success') {
                      alert('Article liké avec succès');
                      location.reload();
                  } else {
                      alert(data); // Affichez le message d'erreur détaillé
                  }
              });
      });
  });
});