<?php 
class cart{
    private $_id;
    private $_id_utilisateur;
    private $_id_facturation;
    private $_id_fournisseur;
    private $_id_status;
    private $_id_drone;
    private $_date;
    private $_prix_total;

    public function __construct($params = array()){
        
        foreach($params as $k => $v){

            $methodName = "set_" . $k;            
            if(method_exists($this, $methodName)) {
                $this->$methodName($v);
            }   
        }
    }

    
    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function set_id($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get the value of _id_utilisateur
     */ 
    public function get_id_utilisateur()
    {
        return $this->_id_utilisateur;
    }

    /**
     * Set the value of _id_utilisateur
     *
     * @return  self
     */ 
    public function set_id_utilisateur($_id_utilisateur)
    {
        $this->_id_utilisateur = $_id_utilisateur;

        return $this;
    }

    /**
     * Get the value of _id_facturation
     */ 
    public function get_id_facturation()
    {
        return $this->_id_facturation;
    }

    /**
     * Set the value of _id_facturation
     *
     * @return  self
     */ 
    public function set_id_facturation($_id_facturation)
    {
        $this->_id_facturation = $_id_facturation;

        return $this;
    }

    /**
     * Get the value of _id_fournisseur
     */ 
    public function get_id_fournisseur()
    {
        return $this->_id_fournisseur;
    }

    /**
     * Set the value of _id_fournisseur
     *
     * @return  self
     */ 
    public function set_id_fournisseur($_id_fournisseur)
    {
        $this->_id_fournisseur = $_id_fournisseur;

        return $this;
    }

    /**
     * Get the value of _id_status
     */ 
    public function get_id_status()
    {
        return $this->_id_status;
    }

    /**
     * Set the value of _id_status
     *
     * @return  self
     */ 
    public function set_id_status($_id_status)
    {
        $this->_id_status = $_id_status;

        return $this;
    }

    /**
     * Get the value of _id_drone
     */ 
    public function get_id_drone()
    {
        return $this->_id_drone;
    }

    /**
     * Set the value of _id_drone
     *
     * @return  self
     */ 
    public function set_id_drone($_id_drone)
    {
        $this->_id_drone = $_id_drone;

        return $this;
    }

    /**
     * Get the value of _date
     */ 
    public function get_date()
    {
        return $this->_date;
    }

    /**
     * Set the value of _date
     *
     * @return  self
     */ 
    public function set_date($_date)
    {
        $this->_date = $_date;

        return $this;
    }

    /**
     * Get the value of _prix_total
     */ 
    public function get_prix_total()
    {
        return $this->_prix_total;
    }

    /**
     * Set the value of _prix_total
     *
     * @return  self
     */ 
    public function set_prix_total($_prix_total)
    {
        $this->_prix_total = $_prix_total;

        return $this;
    }
}
?>