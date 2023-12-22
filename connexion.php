<?php include_once("classe/utilisateurManager.php");
//start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
//to add later: check on cookie data
if(!isset($_SESSION['user']) && isset($_COOKIE['mail']) && isset($_COOKIE['password'])){
    //try to connect

    $con = UtilisateurManager::getUserConnection($_COOKIE['mail'],$_COOKIE['password']);
    if($con === null){  //if infos were wrong disconnect
        echo("<script>disconnect()</script>");
    }
}


//find if connected or error connecting

            

if(isset($_GET['loginreq'])){     
    if(isset($_POST['mail']) && isset($_POST['pwd']))       
    {
        $con = UtilisateurManager::getUserConnection($_POST['mail'],$_POST['pwd']);
        if($con == null){
            $_SESSION['connErr'] = true;
        }
        else{//userfound
            $_SESSION['user'] = $con;
            if(isset($_POST['stayCon']) && $_POST['stayCon'] == 'on'){ //if stays connected
                echo("<script>setCookie(\"mail\"," . $_POST['mail'] . ") </script>");
                echo("<script>setCookie(\"password\"," . $_POST['pwd']. ") </script>");
            }
        }
    }
}

?>

<?php include_once("inc/header.php"); ?>



<div class="center-flex">

    <h1>Se connecter</h1>
    <?php 
    if(isset($_SESSION['user'])){
        echo('<div class="welcome-message"><h2>Rebonjour '. $_SESSION['user']->get_prenom() ."</h2></div>");
    }
    ?>
    <form method="post" action="./connexion.php?loginreq" class=<?php echo(getFormClasses()); ?>>
        <fieldset>
            <div class="row-form">
                <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip required>
            </div>

            <div class="row-form">
                <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip required>
            </div>
        
            <div class="row-form">
                <label for="stayconip">Rester connecté : </label><input type="checkbox" name="stayCon" id=stayconip value="on" checked>
            </div>
         

            <button type="submit" class="submitbutton" >Connexion</button>

            <?php //affiche erreur de connexion
            if(isset($_SESSION['connErr']) && $_SESSION['connErr'] == true ){
                echo('<p class="errMsg">ERREUR DE CONNEXION COURRIEL OU MOT DE PASSE ERRONÉ</p>');
                $_SESSION['connErr'] = false;
            }

            ?>
        </fieldset>
    </form>
</div>

<?php include_once("inc/footer.php"); ?>