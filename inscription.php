<?php include_once("inc/header.php"); ?>


<div class="center-flex">

    <h1>S'inscrire</h1>

    <form method="post" action="./connexion.php?loginreq" class="loginForm">
        <fieldset>
            <div class="row-form-in">
                <div class="label-input">
                    <label for="nip">Prénom : </label><input name="name" id=nip>
                </div>
                <div class="label-input">
                    <label for="fnip">Nom : </label><input name="familyName" id=fnip>
                </div>
            </div>

            <div class="row-form-in">
                <div class="label-input">
                    <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip>
                </div>
                <div class="label-input">
                    <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip>
                </div>
            </div>

            <div class="row-form-in">
                <div class="label-input">
                    <label for="telip">Téléphone : </label><input type="tel" name="tel" id=telip>
                </div>
                <div class="label-input">
                    <label for="stayconip"> Rester Connecté : </label><input type="checkbox" name="stayCon" id=stayconip value="on" checked>
                </div>
            </div>
             
            <?php //affiche erreur de connexion
            if(isset($_SESSION['connErr']) && $_SESSION['connErr'] === true ){
                echo("<p color=red>ERREUR DE CONNEXION COURRIEL OU MOT DE PASSE ERRONÉ</p>");
                $_SESSION['connErr'] = false;
            }
            ?>

            <button type="submit" class="submitbutton" >Connexion</button>
        </fieldset>
        
    </form>
</div>

<?php include_once("inc/footer.php"); ?>