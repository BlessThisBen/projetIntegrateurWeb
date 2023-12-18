/*********** Gestion du menu déroulant ************/

//Écouteur d'événement du menu dépliant
let menuDepliant = document.querySelector(".hamburger-menu");
menuDepliant.addEventListener('click', changeMenu);

/*********** Gestion du collage des menus ************/

window.onscroll = function() {defilement();};


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

function defilement(){
    let menuUtilisateur = document.querySelector('.menu-utilisateur');
    let menuPrincipal = document.querySelector('.menu-principal');

    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        menuUtilisateur.classList.add("u-fixed");
        menuUtilisateur.classList.remove("static");        
    } 
    else {
        menuUtilisateur.classList.add("static");
        menuUtilisateur.classList.remove("u-fixed");
    }
    
    if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200)
    {
        menuPrincipal.classList.add("p-fixed");
        menuPrincipal.classList.remove("static");
    }
    else{
        menuPrincipal.classList.add("static");
        menuPrincipal.classList.remove("p-fixed");
    }
}