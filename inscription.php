<?php include_once("classe/utilisateurManager.php");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

if(isset($_GET['inscriptionreq']) && isset($_POST))
{
    $user = UtilisateurManager::createUser($_POST);

    if($user === null){
        $_SESSION['connErr'] = true;
    }
    else{
        $_SESSION['user'] = $user;

        if(isset($_POST['stayCon']) && $_POST['stayCon'] == 'on'){ //if stays connected
            echo("<script>setCookie(\"mail\"," . $_POST['mail'] . ") </script>");
            echo("<script>setCookie(\"password\"," . $_POST['pwd']. ") </script>");
        }
    }
}

?>



<?php include_once("inc/header.php"); ?>



<div class="center-flex">

    <h1>S'inscrire</h1>

    <?php 
    if(isset($_SESSION['user'])){
        echo('<div class="welcome-message"><h2>Création du compte réussi!<br/>
                                Bienvenue sur Dronica! </h2></div>');
    }
    ?>

    <form method="post" action="./inscription.php?inscriptionreq" class=<?php echo(getFormClasses()); ?>>
        <fieldset>
            <div class="row-form-in">
                <div class="label-input">
                    <label for="nip">Prénom : </label><input name="name" id=nip required>
                </div>
                <div class="label-input">
                    <label for="fnip">Nom : </label><input name="familyName" id=fnip required>
                </div>
            </div>

            <div class="row-form-in">
                <div class="label-input">
                    <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip required>
                </div>
                <div class="label-input">
                    <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip required>
                </div>
            </div>

            <div class="row-form-in">
                <div class="label-input">
                    <label for="telip">Téléphone : </label><input type="tel" name="tel" id=telip required>
                </div>
                <div class="label-input">
                    <label for="stayconip"> Rester Connecté : </label><input type="checkbox" name="stayCon" id=stayconip value="on" checked>
                </div>
            </div>
             
            <?php //affiche erreur de connexion
            if(isset($_SESSION['connErr']) && $_SESSION['connErr'] === true ){
                echo('<p class="errMsg">ERREUR D\'INSCRIPTION, LE COURRIEL EXISTE DÉJÀ</p>');
                $_SESSION['connErr'] = false;
            }
            ?>

            <button type="submit" class="submitbutton" >S'inscrire</button>
        </fieldset>
        
    </form>
</div>

<?php include_once("inc/footer.php"); ?>