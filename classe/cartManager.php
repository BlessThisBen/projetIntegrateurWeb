<?php 
require_once('./classe/cart.php');

class cartManager{
    private $_bdd;

    const INSERT_COMMANDE = "INSERT INTO Commandes (id_utilisateur, id_facturation, id_fournisseur, id_status, id_drone, date, prix_total)
                             VALUES (:id_utilisateur, :id_facturation, :id_fournisseur, :id_status, :id_drone, :date, :prix_total)";
    

    public function __construct(PDO $bdd) { $this->_bdd = $bdd; }

    public function insertCommande(Cart $cartObj) : int { 
        $query = $this->_bdd->prepare(self::INSERT_COMMANDE);
        $bindParamArray = array(
                              ':id_utilisateur' => $cartObj->get_id_utilisateur(),
                              ':id_facturation' => $cartObj->get_id_facturation(),
                              ':id_fournisseur' => $cartObj->get_id_fournisseur(),
                              ':id_status' => $cartObj->get_id_status(),
                              ':id_drone' => $cartObj->get_id_drone(),
                              ':date' => $cartObj->get_date(),
                              ':prix_total' => $cartObj->get_prix_total()
                              );

         assert($query->execute($bindParamArray),
            'L\'insertion de l\'adresse dans la base de données n\'a pas fonctionné.');
  
         return $this->_bdd->lastInsertId();
    }


    
    
}

?>