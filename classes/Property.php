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

    public function insertInto($pdo, $property ){ //propriétés = nom de la variable de la bdd + nom de la variable prenant la classe Property
        $query = "INSERT INTO `proprietes`(`type`, `adresse`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($property->getType(), $property->getAdresse(), $property->getSurface(), $property->getPrix()));
    }

    

    



}