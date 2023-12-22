/***********Gestion du carrousel d'images ************/

var diapoActuel = 0; //Diapositive en cours
var diapoDiv = document.getElementsByClassName("fondu"); //Tableau des diapositives
var totalDiapo = diapoDiv.length; //Nombre total de diapositives

//Écouteurs d'événements pour les boutons suivant/précédent
document.getElementById('next').addEventListener('click', diapoSuivante);
document.getElementById('prev').addEventListener('click', diapoPrecedente);

//Écouteurs d'événements pour les points de signalisation
let points = document.getElementsByClassName("point");
for (let i = 0; i < totalDiapo; i++) { //Écouteur d'événement pour chacun des points
    points[i].addEventListener('click', function () {
        diapoActuel = Array.from(points).indexOf(this);
        afficheDiapo(diapoActuel); //Affiche la diapositive sélectionnée
        pointAJour(); //Met à jour le point de signalisation actif
    });
}

//Écouteur d'événement pour le carrousel
document.addEventListener('DOMContentLoaded', function () {
    afficheDiapo(diapoActuel); //Affiche la diapositive initiale
    pointAJour(); //Met à jour le point de signalisation actif
});

/*********** Fonctions ************/

function afficheDiapo(indice) { //Affiche la diapositive actuelle
    for (let i = 0; i < totalDiapo; i++) {
        diapoDiv[i].classList.add("diapositive-hide"); //Cache les autres diapositives
    }

    diapoDiv[indice].classList.remove("diapositive-hide"); //Enlève la classe qui masque la diapositive qu'on souhaite afficher
}

function diapoSuivante() { //Gestion de la diapositive suivante
    diapoActuel = (diapoActuel + 1) % totalDiapo; //Détermine la diapositive suivante
    afficheDiapo(diapoActuel); //Affiche la diapositive
    pointAJour(); //Met à jour les points de signalisation
}

function diapoPrecedente() { //Gestion de la diapositive précédente
    diapoActuel = (diapoActuel - 1 + totalDiapo) % totalDiapo; //Détermine la diapositive précédente
    afficheDiapo(diapoActuel); //Affiche la diapositive
    pointAJour(); //Met à jour les points de signalisation
}

function pointAJour() { //Met à jour les points de signalisation
    let cercles = document.getElementsByClassName("point"); //Récupération des points de signalisation

    for (let i = 0; i < totalDiapo; i++) {
        cercles[i].classList.remove('active'); //On rend tous les points inactifs
    }

    cercles[diapoActuel].classList.add('active'); //On rend actif le point qui correspond à la diapositive présentement affichée
}