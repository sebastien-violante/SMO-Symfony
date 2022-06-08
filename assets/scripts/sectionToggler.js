const sectionsToToggle = [...document.getElementsByClassName('section-to-toggle')];

document.getElementById('visible-section-choices').addEventListener('click', (e) => {
    console.log(sectionsToToggle);
    sectionsToToggle.forEach(element => {
        element.id === e.target.id + "-section" ? element.classList.add('visible') : element.classList.remove('visible');
    });
});