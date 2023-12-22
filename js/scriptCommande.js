/* Validation du formulaire d'adresse */
document.getElementById("bouton-validation").addEventListener('click', validationFormulaire);

/* Validation de la commande */

document.getElementById("bouton_commande").addEventListener('click', validationCommande);

/************** Fonctions ***************/

function validationFormulaire(evt){
    let inputNumero = document.getElementById("numero_maison");
    let inputRue = document.getElementById("rue");
    let inputVille = document.getElementById("ville");
    let inputProvince = document.getElementById("province");
    let inputPays = document.getElementById("pays");
    let inputCodePostal = document.getElementById("code_postal");

    const inputArr = [inputNumero, inputRue, inputVille, inputProvince, inputPays, inputCodePostal];

    for(let i = 0; i < inputArr.length; i++){
        if(inputArr[i].value == "")
        {
            evt.preventDefault();
            alert("Pour valider votre adresse de livraison, vous devez remplir tous les champs du formulaire");
            break;
        }
    }
}

function validationCommande(e){
    let adresseValide = document.getElementById("adresse_ajoute");
    let inputNom = document.getElementById("proprietaire");
    let inputCarte = document.getElementById("numeroCarte");
    let inputDate = document.getElementById("dateExpiration");
    let inputSecurite = document.getElementById("numeroSecurite");

    const inputCardArr = [inputNom, inputCarte, inputDate, inputSecurite];

    if(Object.is(adresseValide, null) || Object.is(adresseValide, undefined))
    {
        e.preventDefault();
        alert("Vous devez valider votre adresse de facturation avant de passer votre commande!");
    }

    for(let i = 0; i < inputCardArr.length; i++)
    {
        if(inputCardArr[i].value == "")
        {
            e.preventDefault();
            alert("Vous devez ajouter une carte de crédit avant de passer votre commande!");
            break;
        }
    }
}