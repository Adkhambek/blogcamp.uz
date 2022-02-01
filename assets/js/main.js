var typed = new Typed('.type', {
  strings: ['Dasturchi',
    'Dizayner',
    'Bloger',
  ],
  typeSpeed: 60,
  backSpeed: 60,
  loop: true
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});