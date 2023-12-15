<?php 
require_once('./classe/drone.php');

class DroneManager{
    private $_db;

    const SELECT_DRONES = "SELECT Drones.id, modele, Types.nom_type as id_type, Marques.nom_marque as id_marque, Garanties.duree_garantie as id_garantie, prix, image
                            FROM Drones
                            INNER JOIN Types ON Drones.id_type = Types.id
                            INNER JOIN Marques ON Drones.id_marque = Marques.id
                            INNER JOIN Garanties ON Drones.id_garantie = Garanties.id
                            ORDER BY Drones.id";
    
    const SELECT_DRONE_ID = "SELECT Drones.id, modele, id_type, id_marque, id_garantie, prix, image
                                FROM Drones
                                INNER JOIN Types ON Drones.id_type = Types.id
                                INNER JOIN Marques ON Drones.id_marque = Marques.id
                                INNER JOIN Garanties ON Drones.id_garantie = Garanties.id
                                WHERE Drones.id = :idDrone";
    
    private function set_db($db) {
        assert(is_a($db, 'PDO'), 'La classe "DroneManager" doit recevoir une instance (un objet) de la classe "PDO" lors de l\'appel à son constructeur.');
        $this->_db = $db;
      }

    public function __construct($db) { $this->set_db($db); }

    public function getDrones(){
        $droneObjArray = $queryArray = array();

        $query = $this->_db->prepare(self::SELECT_DRONES);
        $query->execute($queryArray);
        $dbResult = $query->fetchAll();

        foreach ($dbResult as $row){
            array_push($droneObjArray, new Drone($row));
        }

      return $droneObjArray;
    }

    public function getDroneById(int $idDrone) {
        
        $query = $this->_db->prepare(self::SELECT_DRONE_ID);
        $query->execute(array("idDrone" => $idDrone));
        $dbResult = $query->fetch();
        
        assert(!empty($dbResult), 'Le ou les identifiant(s) fourni(s) n\'a pas ou n\'ont pas été trouvé(s) dans la base de données.');
  
        return new Drone($dbResult);
      }
}

?>