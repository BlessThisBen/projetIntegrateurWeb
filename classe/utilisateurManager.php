<?php
include_once('./classe/Utilisateur.php');
class UtilisateurManager{
    

    public static function getUserConnection($courriel, $password){
        $con = PDOFactory::getMySQLConnection();
      
        
        $prompt = $con->prepare('SELECT * FROM utilisateurs WHERE courriel = ? AND mdp = ?');
        
        $prompt->execute(array($courriel,$password));

        $ret = $prompt->fetchAll();
       
    
        if($ret == null || !isset($ret)){
            return null;
        }
        else{
            $util = new Utilisateur($ret[0]);

            return $util;
        }
    }

    public static function createUser($args){

        $con = PDOFactory::getMySQLConnection();

        $prompt = $con->prepare('SELECT COUNT(courriel)
        FROM utilisateurs
        WHERE courriel = ? ;');
        
        $prompt->execute(array($args['mail']));

        $ret = $prompt->fetchAll();
        if($ret[0][0]<1)//si courriel existe pas  déja créer l'utilisateur
        {
        $promptSign = $con->prepare(
        'INSERT INTO utilisateurs  
        (prenom, nom, mdp, courriel, telephone)
        VALUES
        (?, ?, ?, ?, ?) ');

        $promptSign->execute(array($args['name'],$args['familyName'],$args['pwd'],$args['mail'],$args['tel']));
            

        //retourner l'utilisateur créé
        return UtilisateurManager::getUserConnection($args['mail'], $args['pwd']);

        }
        else{//sinon retouner null
            return null;
        }
    }


}




?>

