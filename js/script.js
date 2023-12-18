/*********** Gestion du menu déroulant ************/

//Écouteur d'événement du menu dépliant
let menuDepliant = document.querySelector(".hamburger-menu");
menuDepliant.addEventListener('click', changeMenu);


/*********** Fonctions ************/

function changeMenu(){
    let menuOuvert = document.querySelector(".menu-ouvert");
    let menuFerme = document.querySelector(".menu-ferme");

    if (menuFerme) {
        menuFerme.classList.add("menu-ouvert");
        menuFerme.classList.remove("menu-ferme");
    } 
    
    else if (menuOuvert) {
        menuOuvert.classList.add("menu-ferme");
        menuOuvert.classList.remove("menu-ouvert");
    }
}