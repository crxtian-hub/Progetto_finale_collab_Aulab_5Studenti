var navbar = document.getElementById('navbar');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    var currentScroll = window.window.scrollY;

    if (currentScroll > 50) {
        navbar.classList.add('fixed', 'blur');
    } else {
        navbar.classList.remove('fixed', 'blur');
    }

    lastScroll = currentScroll;
});