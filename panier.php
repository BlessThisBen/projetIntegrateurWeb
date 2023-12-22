<?php include_once("inc/header.php"); ?>

<h1>Votre panier: </h1>

<?php if(isset($_REQUEST['drone-submit'])){
    $droneID = $_REQUEST['drone-id'];
    $dm = new droneManager($bdd);
    $drone = $dm->getDroneById($droneID);
    $_SESSION['droneID'] = $droneID;
    $_SESSION['prixTotal'] = $drone->get_prix();

    if(isset($drone)){ ?>
        <h2>Voici le drone que vous avez choisi:</h2>
        <div class="column flex-center">
            <div class="drone-solo">
                <h2><?=$drone->get_modele()?></h2>
                <img src="./img/drones/<?=$drone->get_image()?>" alt="Photo du drone" class="img-drone">
                <p>Marque: <?=$drone->get_id_marque()?></p>
                <p>Type: <?=$drone->get_id_type()?></p>
                <p>Garantie: <?=$drone->get_id_garantie()?> jours</p>
                <p>Prix: <?=$drone->get_prix()?>$</p>
            </div>
            <a href="formulaireAchat.php" class="commande-bouton">Finaliser la commande</a>
        </div>
    <?php } 
    else{
        echo "<h3>Aucun objet drone n'a pu être sélectionné.</h3>";
    }
}
else{
    echo "<h3>Vous devez sélectionner un drone avant de passer une commande!</h3>"; 
}?>

<?php include_once("inc/footer.php"); ?>