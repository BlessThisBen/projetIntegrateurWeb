<?php 
require_once './classe/adresse.php';

class adresseManager{
    
    const INSERT_ADDRESS = "INSERT INTO adresse_facturation (code_postal, numero_maison, num_appartement, pays, province, rue, ville)
                           VALUES (:code_postal, :numero_maison, :num_appartement, :pays, :province, :rue, :ville)";
    
    const SELECT_LAST_ADDRESS_ID = "SELECT MAX(id)
                                    FROM adresse_facturation";
    
    private $_bdd;

    public function __construct(PDO $bdd) { $this->_bdd = $bdd; }

    public function insertAddress(Adresse $adresseObj) : int { 
        $query = $this->_bdd->prepare(self::INSERT_ADDRESS);
        $bindParamArray = array(
                              ':code_postal' => $adresseObj->get_code_postal(),
                              ':numero_maison' => $adresseObj->get_numero_maison(),
                              ':num_appartement' => $adresseObj->get_num_appartement(),
                              ':pays' => $adresseObj->get_pays(),
                              ':province' => $adresseObj->get_province(),
                              ':rue' => $adresseObj->get_rue(),
                              ':ville' => $adresseObj->get_ville()
                              );

         assert($query->execute($bindParamArray),
            'L\'insertion de l\'adresse dans la base de données n\'a pas fonctionné.');
  
         return $this->_bdd->lastInsertId();
    }

    public function getLastAddressID(): int {
        $query = $this->_bdd->prepare(self::SELECT_LAST_ADDRESS_ID);
        $query->execute();
        $dbResult = $query->fetch();
        
        assert(!empty($dbResult), 'Le ou les identifiant(s) fourni(s) n\'a pas ou n\'ont pas été trouvé(s) dans la base de données.');
  
        return $dbResult[0];
    }
}
?>