<?php 
class Adresse{
    private $_id;
    private $_code_postal;
    private $_numero_maison;
    private $_num_appartement;
    private $_pays;
    private $_province;
    private $_rue;
    private $_ville;

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
     * Get the value of _code_postal
     */ 
    public function get_code_postal()
    {
        return $this->_code_postal;
    }

    /**
     * Set the value of _code_postal
     *
     * @return  self
     */ 
    public function set_code_postal($_code_postal)
    {
        $this->_code_postal = $_code_postal;

        return $this;
    }

    /**
     * Get the value of _numero_maison
     */ 
    public function get_numero_maison()
    {
        return $this->_numero_maison;
    }

    /**
     * Set the value of _numero_maison
     *
     * @return  self
     */ 
    public function set_numero_maison($_numero_maison)
    {
        $this->_numero_maison = $_numero_maison;

        return $this;
    }

    /**
     * Get the value of _num_appartement
     */ 
    public function get_num_appartement()
    {
        return $this->_num_appartement;
    }

    /**
     * Set the value of _num_appartement
     *
     * @return  self
     */ 
    public function set_num_appartement($_num_appartement)
    {
        $this->_num_appartement = $_num_appartement;

        return $this;
    }

    /**
     * Get the value of _pays
     */ 
    public function get_pays()
    {
        return $this->_pays;
    }

    /**
     * Set the value of _pays
     *
     * @return  self
     */ 
    public function set_pays($_pays)
    {
        $this->_pays = $_pays;

        return $this;
    }

    /**
     * Get the value of _province
     */ 
    public function get_province()
    {
        return $this->_province;
    }

    /**
     * Set the value of _province
     *
     * @return  self
     */ 
    public function set_province($_province)
    {
        $this->_province = $_province;

        return $this;
    }

    /**
     * Get the value of _rue
     */ 
    public function get_rue()
    {
        return $this->_rue;
    }

    /**
     * Set the value of _rue
     *
     * @return  self
     */ 
    public function set_rue($_rue)
    {
        $this->_rue = $_rue;

        return $this;
    }

    /**
     * Get the value of _ville
     */ 
    public function get_ville()
    {
        return $this->_ville;
    }

    /**
     * Set the value of _ville
     *
     * @return  self
     */ 
    public function set_ville($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }
}
?>