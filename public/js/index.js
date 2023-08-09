const pseudoElement = document.querySelector('.pseudo');
const buttonElement = document.querySelector('.btn-logout');

pseudoElement.addEventListener('click', () => {
// Lorsque l'utilisateur survole l'élément "pseudo", afficher le bouton
    buttonElement.classList.toggle('active-btn-logout');
});

buttonElement.addEventListener('click', () => {
    // Lorsque l'utilisateur survole l'élément "pseudo", afficher le bouton
    pseudoElement.style.display = 'none';
    buttonElement.style.display = 'none';
    
});



    

       





