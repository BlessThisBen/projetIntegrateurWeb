<?php
include_once("./classe/PDOFactory.php");

class Utilisateur{
    private $_id;
    private $_prenom;
    private $_nom;
    private $_mdp;
    private $_courriel;
    private $_telephone;
    

    public function __construct(array $args=array()){
       


        foreach($args as $varname =>$var){
            $metdcall= "set_" . $varname;
            if(method_exists($this, $metdcall)){
                $this->$metdcall($var);
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
     * Get the value of _prenom
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set the value of _prenom
     *
     * @return  self
     */ 
    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _courriel
     */ 
    public function get_courriel()
    {
        return $this->_courriel;
    }

    /**
     * Set the value of _courriel
     *
     * @return  self
     */ 
    public function set_courriel($_courriel)
    {
        $this->_courriel = $_courriel;

        return $this;
    }

    /**
     * Get the value of _telephone
     */ 
    public function get_telephone()
    {
        return $this->_telephone;
    }

    /**
     * Set the value of _telephone
     *
     * @return  self
     */ 
    public function set_telephone($_telephone)
    {
        $this->_telephone = $_telephone;

        return $this;
    }

    /**
     * Get the value of _mdp
     */ 
    public function get_mdp()
    {
        return $this->_mdp;
    }

    /**
     * Set the value of _mdp
     *
     * @return  self
     */ 
    public function set_mdp($_mdp)
    {
        $this->_mdp = $_mdp;

        return $this;
    }
}

?>