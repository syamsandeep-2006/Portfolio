// Smooth scrolling
document.querySelectorAll('nav a[href^="#"]').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) target.scrollIntoView({ behavior: 'smooth' });

    // Close menu on click (mobile)
    document.getElementById('nav-links').classList.remove('active');
  });
});

// Contact form validation
const form = document.querySelector('form');
form.addEventListener('submit', function (e) {
  const name = form.querySelector('input[type="text"]');
  const email = form.querySelector('input[type="email"]');
  const message = form.querySelector('textarea');
  if (!name.value || !email.value || !message.value) {
    alert('Please fill out all fields.');
    e.preventDefault();
  } else {
    alert('Thank you! Your message has been sent.');
  }
});

// Scroll animation
function revealOnScroll() {
  document.querySelectorAll('section').forEach(section => {
    const windowHeight = window.innerHeight;
    const sectionTop = section.getBoundingClientRect().top;
    if (sectionTop < windowHeight - 100) {
      section.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

// Menu toggle
const menuBtn = document.getElementById('menu-btn');
const navLinks = document.getElementById('nav-links');

menuBtn.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});
