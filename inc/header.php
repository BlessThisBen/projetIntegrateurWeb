<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

include_once("inc/autoloader.php");
include_once("classe/PDOFactory.php");

$bdd = PDOFactory::getMySQLConnection();

$parts = explode('/', $_SERVER["SCRIPT_NAME"]); //Permet d'obtenir le chemin d'accès au fichier
$file = $parts[count($parts) - 1]; //Permet d'avoir le nom du fichier de la page chargée avec l'extension
$fileInfo = pathinfo($file); //Retourne un tableau contenant les informations du fichier
$fileName = $fileInfo['filename']; //Retourne uniquement le nom du fichier, sans l'extension

?>

<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Pour l'icône du menu "hamburger" -->
    <title>Dronica - <?= $fileName ?></title> <!-- Affiche la page chargée dans l'onglet du navigateur -->
    <link rel="icon" type="image/x-icon" href="./img/DroneIcon.ico"> <!-- Icône d'onglet du site -->
    <script src="js/script.js" defer></script>
</head>
<body>
    <main>

        <nav class="menu-utilisateur">
            <ul>
                <li><div class="hamburger-menu">
                    <span>&#9776;</span>
                        <div class="menu-ferme">
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="drones.php">Drones</a></li>
                                <li><a href="fournisseurListe.php">Fournisseurs</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="panier.php">Panier</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>

        <img class="banniere" src="img/banniereDesktop.png" alt="Bannière Dronica">

        <nav class="menu-principal">
            <ul>
                <li <?php if($file == "index.php"){ ?>class="active" <?php }?>><a href="index.php">Accueil</a></li>
                <li <?php if($file == "drones.php"){ ?>class="active" <?php }?>><a href="drones.php">Drones</a></li>
                <li <?php if($file == "fournisseurListe.php"){ ?>class="active" <?php }?>><a href="fournisseurListe.php">Fournisseurs</a></li>
            </ul>
        </nav>
    
    
