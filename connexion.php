<?php include_once("classe/utilisateurManager.php");
//start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

//find if connected or error connecting

            //to add later: check on cookie data

if(isset($_GET['loginreq']) && $_GET['loginreq'] == 1){     
    if(isset($_POST['mail']) && isset($_POST['pwd']))       
    {
        $con = UtilisateurManager::getUserConnection($_POST['mail'],$_POST['pwd']);
        if($con === null){
            $_SESSION['connErr'] = true;
        }
        else{//userfound
            $_SESSION['user'] = $con;
        }
    }
}
?>

<?php include_once("inc/header.php"); ?>




<div>

    <div>Se Connecter</div>

    <form method="post" action="./connexion.php?loginreq=1" class="loginForm">
        
    <div>

        <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip>

        <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip>

        <label for="stayconip"> Rester Connecté : </label><input type="checkbox" name="stayCon" id=stayconip> 

        <?php //affiche erreur de connexion
        if(isset($_SESSION['connErr']) && $_SESSION['connErr'] === true ){
            echo("<p color=red>ERREUR DE CONNEXION COURRIEL OU MOT DE PASSE ERRONÉ</p>");
            $_SESSION['connErr'] = false;
        }

        ?>

        <button type="submit" class="submitbutton" >Connexion</button>

    </div>
    </form>
</div>

<?php include_once("inc/footer.php"); ?>