<?php include_once("inc/header.php"); ?>


<div class="center-flex">

    <div class="log-title">Se Connecter</div>

    <form method="post" action="./connexion.php?loginreq" class="loginForm">
        
        <label for="nip">Prénom : </label><input name="name" id=nip>
        <label for="fnip">Nom : </label><input name="familyName" id=fnip>
        <label for="telip">Téléphone : </label><input type="tel" name="tel" id=telip>
        <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip>

        <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip>
        

        <label for="stayconip"> Rester Connecté : </label><input type="checkbox" name="stayCon" id=stayconip value="on" checked> 

        <?php //affiche erreur de connexion
        if(isset($_SESSION['connErr']) && $_SESSION['connErr'] === true ){
            echo("<p color=red>ERREUR DE CONNEXION COURRIEL OU MOT DE PASSE ERRONÉ</p>");
            $_SESSION['connErr'] = false;
        }

        ?>

        <button type="submit" class="submitbutton" >Connexion</button>

        
    </form>
</div>

<?php include_once("inc/footer.php"); ?>