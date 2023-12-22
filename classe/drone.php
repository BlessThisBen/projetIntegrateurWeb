<?php
class Drone{
    private $_id;
    private $_modele;
    private $_id_type;
    private $_id_marque;
    private $_id_garantie;
    private $_prix;
    private $_image;

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
     * Get the value of _modele
     */ 
    public function get_modele()
    {
        return $this->_modele;
    }

    /**
     * Set the value of _modele
     *
     * @return  self
     */ 
    public function set_modele($_modele)
    {
        $this->_modele = $_modele;

        return $this;
    }

    /**
     * Get the value of _id_type
     */ 
    public function get_id_type()
    {
        return $this->_id_type;
    }

    /**
     * Set the value of _id_type
     *
     * @return  self
     */ 
    public function set_id_type($_id_type)
    {
        $this->_id_type = $_id_type;

        return $this;
    }

    /**
     * Get the value of _id_marque
     */ 
    public function get_id_marque()
    {
        return $this->_id_marque;
    }

    /**
     * Set the value of _id_marque
     *
     * @return  self
     */ 
    public function set_id_marque($_id_marque)
    {
        $this->_id_marque = $_id_marque;

        return $this;
    }

    /**
     * Get the value of _id_garantie
     */ 
    public function get_id_garantie()
    {
        return $this->_id_garantie;
    }

    /**
     * Set the value of _id_garantie
     *
     * @return  self
     */ 
    public function set_id_garantie($_id_garantie)
    {
        $this->_id_garantie = $_id_garantie;

        return $this;
    }

    /**
     * Get the value of _prix
     */ 
    public function get_prix()
    {
        return $this->_prix;
    }

    /**
     * Set the value of _prix
     *
     * @return  self
     */ 
    public function set_prix($_prix)
    {
        $this->_prix = $_prix;

        return $this;
    }

    /**
     * Get the value of _image
     */ 
    public function get_image()
    {
        return $this->_image;
    }

    /**
     * Set the value of _image
     *
     * @return  self
     */ 
    public function set_image($_image)
    {
        $this->_image = $_image;

        return $this;
    }
}

?>