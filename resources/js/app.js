import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
  const toggleMenuBtn = document.getElementById('open-menu-mobile');
  const navigationMobile = document.querySelector('.navigation-mobile');
  const navigationLinks = navigationMobile.querySelectorAll('a');

  if (toggleMenuBtn && navigationMobile) {
    function toggleMenu() {
      navigationMobile.classList.toggle('active');
      toggleMenuBtn.classList.toggle('active');
    }

    toggleMenuBtn.addEventListener('click', toggleMenu);

    navigationLinks.forEach(link => {
      link.addEventListener('click', () => {
        navigationMobile.classList.remove('active');
        toggleMenuBtn.classList.remove('active');
      });
    });
  }
});

