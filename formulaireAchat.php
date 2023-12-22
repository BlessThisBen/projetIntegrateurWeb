<?php include_once("inc/header.php"); ?>
<script src="js/scriptCommande.js" defer></script>
<?php $am = new adresseManager($bdd); ?>

<h1>Informations d'achat et de livraison</h1>

<?php   $droneID = $_SESSION['droneID'];
        $dm = new droneManager($bdd);
        $drone = $dm->getDroneById($droneID); ?>

<h2>Voici le drone que vous avez choisi:</h2>
<div class="column flex-center">
    <p><strong>Modèle: </strong><?=$drone->get_modele()?></p>
    <p><strong>Marque: </strong><?=$drone->get_id_marque()?></p>
    <p><strong>Prix: </strong><?=$drone->get_prix()?>$</p>
</div>


<div class="achat-form-page">
    <form action="./formulaireAchat.php" method="get">
            <div class="achat-form">
                <h3>1. Adresse d'expédition</h3>
                <div class="label-input">
                    <label for="numero_maison">Numéro d'adresse: </label><input type="text" name="numero_maison" id="numero_maison" placeholder="1234" required>
                    <input type="hidden" name="num_appartement" value="">
                </div>
                <div class="label-input">
                    <label for="rue">Rue: </label><input type="text" name="rue" id="rue" placeholder="Mirco" required>
                </div>
                <div class="label-input">
                    <label for="ville">Ville: </label><input type="text" name="ville" id="ville" placeholder="Montréal" required>
                </div>
                <div class="label-input">
                    <label for="province">Province ou état: </label><input type="text" name="province" id="province" placeholder="QC" required>
                </div>
                <div class="label-input">
                    <label for="pays">Pays: </label><input type="text" name="pays" id="pays" placeholder="Canada" required>
                </div>
                <div class="label-input">
                    <label for="code_postal">Code postal: </label><input type="text" name="code_postal" id="code_postal" placeholder="AAA AAA" required>
                </div>
                <input type="hidden" name="action" value="add_address">
                <input type="submit" name="adresse_expedition" value="Valider" id="bouton-validation" title="Valider">
                
                <?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_address'){ 
                    $adresseObj = new Adresse($_REQUEST);
                    if ($am->insertAddress($adresseObj)){
						echo '<p class="flex-center" id="adresse_ajoute">L\'adresse a bien été ajoutée!</p>';
                        $_SESSION['adresse'] = $am->getLastAddressID();
                    }
					else {
						echo '<p class="flex-center">L\'adresse n\'a pas été ajoutée.</p>';
                    }
                } ?>
            </div>
    </form>

    <form action="./formulaireAchat.php" method="post">
            <div class="achat-form">
                <h3>2. Mode de paiement</h3>
                <div class="row-form">
                    <div class="cercle">
                        <span class="plus">&plus;</span>
                    </div>
                    <p id="credit">Ajouter une carte de crédit</p>
                </div>
                <div class="label-input">
                    <label for="proprietaire">Nom du propriétaire: </label><input type="text" name="proprietaire" id="proprietaire" placeholder="prénom, nom">
                </div>
                <div class="label-input">
                    <label for="numeroCarte">Numéro de la carte: </label><input type="text" name="numeroCarte" id="numeroCarte" placeholder="1111 2222 3333 4444" maxlength="19">
                </div>
                <div class="label-input">
                    <label for="dateExpiration">Date d'expiration: </label><input type="month" name="dateExpiration" id="dateExpiration" placeholder="11/25">
                </div>
                <div class="label-input">
                    <label for="numeroSecurite">Numéro de sécurité: </label><input type="text" name="numeroSecurite" id="numeroSecurite" placeholder="123">
                </div>
            </div>
    </form>
</div>
<div class="row flex-center">
    <form action="./traitement.php" method="post" id="form-commande">
        <input type="hidden" name="action" value="commande">
        <input type="submit" class="commande-bouton" value="Passer la commande!" name="envoi_commande" title="Passer la commande" id="bouton_commande">
    </form>
</div>

<?php include_once("inc/footer.php"); ?>