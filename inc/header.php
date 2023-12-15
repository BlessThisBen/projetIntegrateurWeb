<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

include_once("inc/autoloader.php");
include_once("classe/PDOFactory.php");

$bdd = PDOFactory::getMySQLConnection();

$parts = explode('/', $_SERVER["SCRIPT_NAME"]);
$file = $parts[count($parts) - 1];

?>

<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
    <script src="js/script.js" defer></script>
</head>
<body>
    <main>

        <nav class="menu-utilisateur">
            <ul>
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
    
    
