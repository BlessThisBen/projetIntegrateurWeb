<?php include_once("inc/header.php"); ?>

<?php $cm = new cartManager($bdd) ?>

<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=='commande'){ 
    $droneID = $_SESSION['droneID'];
    $userID = 1; /* Puisque la connexion utilisateur n'a pas été validée, on prend pour acquis que l'utilisateur qui passe la commande est l'utilisateur 1 de la BD */
    $address = $_SESSION['adresse'];
    $fournisseurID = 1; /* L'identifiant du fournisseur est mis par défaut à 1, ce qui correspond à DJI. Il aurait fallu créer une autre classe pour gérer les requêtes à cette table de la BD, mais le temps manque pour implémenter cette fonctionnalité */
    $statusID = 2; /* Correspond à "traitement", ce qui est logique après qu'une commande ait été passée */
    $date = date("Y-m-d");
    $dronePrix = $_SESSION['prixTotal'];

    $cartObj = new Cart();
    $cartObj->set_id_utilisateur($userID);
    $cartObj->set_id_drone($droneID);
    $cartObj->set_id_facturation($address);
    $cartObj->set_id_fournisseur($fournisseurID);
    $cartObj->set_id_status($statusID);
    $cartObj->set_date($date);
    $cartObj->set_prix_total($dronePrix);

    if ($cm->insertCommande($cartObj)){
?>


<h1>Votre commande a bien été reçue!</h1>
<h2>Merci d'avoir fait confiance à Dronica!</h2>

<?php } 
else { ?>
<h1>Une erreur est survenue</h1>
<h2>Nous sommes désolé, nous n'avons pas pu traiter votre commande</h2>
<?php } 
}?>

<?php include_once("inc/footer.php"); ?>