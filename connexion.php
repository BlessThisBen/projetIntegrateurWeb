<?php include_once("classe/utilisateurManager.php");
//start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

//find if connected or error connecting

            //to add later: check on cookie data

if(isset($_GET['loginreq'])){     
    if(isset($_POST['mail']) && isset($_POST['pwd']))       
    {
        $con = UtilisateurManager::getUserConnection($_POST['mail'],$_POST['pwd']);
        if($con === null){
            $_SESSION['connErr'] = true;
        }
        else{//userfound
            $_SESSION['user'] = $con;
            if(isset($_POST['stayCon']) && $_POST['stayCon'] == 'on'){
                
            }
        }
    }
}
?>

<?php include_once("inc/header.php"); ?>




<div class="center flex">

    <h1>Se connecter</h1>

    <form method="post" action="./connexion.php?loginreq" class="loginForm">
        <fieldset>
            <div class="row-form">
                <label for="mailip">Courriel : </label><input type="email" name="mail" id=mailip>
            </div>

            <div class="row-form">
                <label for="pwdip">Mot de passe : </label><input type="password" name="pwd" id=pwdip>
            </div>
        
            <div class="row-form">
                <label for="stayconip">Rester connecté : </label><input type="checkbox" name="stayCon" id=stayconip value="on" checked>
            </div>
         

            <button type="submit" class="submitbutton" >Connexion</button>

            <?php //affiche erreur de connexion
            if(isset($_SESSION['connErr']) && $_SESSION['connErr'] === true ){
                echo("<p color=red>ERREUR DE CONNEXION COURRIEL OU MOT DE PASSE ERRONÉ</p>");
                $_SESSION['connErr'] = false;
            }

            ?>
        </fieldset>
    </form>
</div>

<?php include_once("inc/footer.php"); ?>