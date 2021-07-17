
const hamburger = document.getElementById('hamburger');
const ul =document.getElementById('header-ul');
hamburger.addEventListener('click', ()=> {
    ul.classList.toggle('show')
});