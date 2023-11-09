<?php 
class Property {
    private $type;
    private $adresse;
    private $surface;
    private $prix;

    public function __construct($type, $adresse, $surface, $prix) {
        $this->type = $type;
        $this->adresse = $adresse;
        $this->surface = $surface;
        $this->prix = $prix;
    }

    public function getType() : string{
        return $this->type;
    }

    public function setType(){

    }

    public function getAdresse() :string{
        return $this->adresse;
    }
    
    public function setAdresse(){
        
    }
    
    public function getSurface() :int{
        return $this->surface;
    }
    
    public function setSurface(){

    }

    public function getPrix() :int{
        return $this->prix;
    }
    
    public function setPrix(){
        
    }



}