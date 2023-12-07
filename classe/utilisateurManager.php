<?php
include_once('./classe/Utilisateur.php');
class UtilisateurManager{
    

public static function getUserConnection($courriel, $password){
$con = PDOFactory::getMySQLConnection();

$prompt = $con->prepare('SELECT TOP 1 FROM Utilisateurs WHERE courriel = :courriel AND mdp = :mdp ;');

if( $prompt->execute([ 'name' => $courriel , 'mdp' => $password]) !== null){
    return new Utilisateur($prompt->fetchAll());
    //return Utilisateur($prompt->fetch());
}
else{
    return null;
}



}



}

?>

