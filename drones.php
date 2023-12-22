<?php include_once("inc/header.php"); ?>

<?php $dm = new droneManager($bdd) ?>

<h1>Drones présentement disponibles</h1>

<div id="drones-liste">
<?php 
    $droneArray = $dm->getDrones();

    foreach($droneArray as $drone){
    ?>

    <div class="drone-solo">
        <h2><?=$drone->get_modele()?></h2>
        <img src="./img/drones/<?=$drone->get_image()?>" alt="Photo du drone" class="img-drone">
        <p>Marque: <?=$drone->get_id_marque()?></p>
        <p>Type: <?=$drone->get_id_type()?></p>
        <p>Garantie: <?=$drone->get_id_garantie()?> jours</p>
        <p>Prix: <?=$drone->get_prix()?>$</p>
        <form action="panier.php" method="post">
            <input type="hidden" name="drone-id" value="<?=$drone->get_id() ?>">
            <input type="submit" name="drone-submit" class="drone-button" title="Ajouter au panier" value="Acheter ce drone!">
        </form>
    </div>

    <?php } ?>
</div>

<?php include_once("inc/footer.php"); ?>