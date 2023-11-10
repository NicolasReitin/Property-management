<?php 
class Terrain {
    private $projet;
    private $adresse;
    private $surface;
    private $prix;

    public function __construct($projet, $adresse, $surface, $prix) {
        $this->projet = $projet;
        $this->adresse = $adresse;
        $this->surface = $surface;
        $this->prix = $prix;
    }

    public function getProjet() : string{
        return $this->projet;
    }

    public function setProjet(){

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