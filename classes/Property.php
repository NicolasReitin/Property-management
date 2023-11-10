<?php 
require_once 'SurfacePlusPrix.php';

final class Property extends SurfacePlusPrix{
    private $terrain;
    private $adresse;
    private $nombreDePieces;

    public function __construct($terrain, $adresse, $surface, $nombreDePieces, $prix) {
        parent::__construct($surface, $prix);
        $this->terrain = $terrain;
        $this->adresse = $adresse;
        $this->nombreDePieces = $nombreDePieces;
    }

    public function getTerrain() : string{
        return $this->terrain;
    }

    public function setTerrain(){

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

    public function getNombreDePieces() :int{
        return $this->nombreDePieces;
    }
    
    public function setNombreDePieces(){
        
    }

    public function getPrix() :int{
        return $this->prix;
    }
    
    public function setPrix(){
        
    }

    public function insertInto($pdo){ //propriétés = nom de la variable de la bdd + nom de la variable prenant la classe Property
        $query = "INSERT INTO `proprietes`(`type`, `adresse`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($this->terrain, $this->adresse, $this->surface, $this->nombreDePieces, $this->prix));
    }

    

    



}