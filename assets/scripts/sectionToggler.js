import '../styles/detailedView.css';

const sectionsToToggle = [...document.getElementsByClassName('section-to-toggle')];
const sectionSelectors = [...document.querySelectorAll('#visible-section-choices>li>button')];

document.getElementById('visible-section-choices').addEventListener('click', (e) => {
    console.log(e.target.id);
    if(e.target.id !== "visible-section-choices") {
        sectionsToToggle.forEach(element => {
            element.id === e.target.id + "-section" ? element.classList.add('visible') : element.classList.remove('visible');
        });
        sectionSelectors.forEach(element => {
            element.id === e.target.id ? element.classList.add('chosen') : element.classList.remove('chosen');
        });
    };
});