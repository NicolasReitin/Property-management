<?php 
require_once 'SurfacePlusPrix.php';

final class Terrain extends SurfacePlusPrix { //
    private $projet;
    private $ville;

    public function __construct($projet, $ville, $surface, $prix) {
        parent::__construct($surface, $prix);
        $this->projet = $projet;
        $this->ville = $ville;
    }

    public function getProjet() : string{
        return $this->projet;
    }

    public function setProjet(){

    }

    public function getVille() :string{
        return $this->ville;
    }
    
    public function setVille(){
        
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

    public function insertInto($pdo){ //propriétés = nom de la variable de la bdd + nom de la variable prenant la classe Property
        $query = "INSERT INTO `terrains`(`projet`, `ville`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($this->projet, $this->ville, $this->surface, $this->prix));
    }

    

    



}