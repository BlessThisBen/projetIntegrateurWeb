<?php include_once("inc/header.php"); ?>

<?php $dm = new droneManager($bdd) ?>
<?php $droneArray = $dm->getDrones(); ?>

<h1>Bienvenue sur Dronica!</h1>

<h2>Venez explorer votre passion pour les drones avec nous!</h2>


<!--Carousel d'images-->
<div id="carousel-conteneur">
    <div class="diapositive-hide fondu">
        <div class="diapositive-numero">1 / 4</div>
        <img title="<?=$droneArray[0]->get_id_marque()?> <?=$droneArray[0]->get_modele()?>" class="carousel-images" src="./img/drones/<?=$droneArray[0]->get_image()?>" alt="image1">
        <div class="carousel-texte"><?=$droneArray[0]->get_id_marque()?> <?=$droneArray[0]->get_modele()?> !</div>
    </div>

    <div class="diapositive-hide fondu">
        <div class="diapositive-numero">2 / 4</div>
        <img title="<?=$droneArray[4]->get_id_marque()?> <?=$droneArray[4]->get_modele()?>" class="carousel-images" src="./img/drones/<?=$droneArray[4]->get_image()?>" alt="image2">
        <div class="carousel-texte"><?=$droneArray[4]->get_id_marque()?> <?=$droneArray[4]->get_modele()?> !</div>
    </div>

    <div class="diapositive-hide fondu">
        <div class="diapositive-numero">3 / 4</div>
        <img title="<?=$droneArray[8]->get_id_marque()?> <?=$droneArray[8]->get_modele()?>" class="carousel-images" src="./img/drones/<?=$droneArray[8]->get_image()?>" alt="image3">
        <div class="carousel-texte"><?=$droneArray[8]->get_id_marque()?> <?=$droneArray[8]->get_modele()?> !</div>
    </div>

    <div class="diapositive-hide fondu">
        <div class="diapositive-numero">4 / 4</div>
        <img title="<?=$droneArray[15]->get_id_marque()?> <?=$droneArray[15]->get_modele()?>" class="carousel-images" src="./img/drones/<?=$droneArray[15]->get_image()?>" alt="image4">
        <div class="carousel-texte"><?=$droneArray[15]->get_id_marque()?> <?=$droneArray[15]->get_modele()?> !</div>
    </div>

    <!--Boutons suivant/précédent-->
    <a id="prev">&#10094;</a>
    <a id="next">&#10095;</a>
</div>

<!--Les points/ronds de signalisation-->
<div id="points-conteneur">
    <span class="point"></span>
    <span class="point"></span>
    <span class="point"></span>
    <span class="point"></span>
</div>

<?php include_once("inc/footer.php"); ?>