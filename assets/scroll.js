// JS code to change the footer backround in case of scroll
const footer = document.getElementsByClassName('.footer');

window.addEventListener('scroll', () => {
    if(window.scrollY > 100) {
        footer.classList.add('scroll');
    }
});