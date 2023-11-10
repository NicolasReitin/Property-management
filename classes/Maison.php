<?php 

class Maison extends Property {
    private $nombreChambres;

    public function __construct($type, $adresse, $surface, $prix, $nombreChambres) {
        parent::__construct($type, $adresse, $surface, $prix);
        $this->nombreChambres = $nombreChambres;
    }

    public function getNombreChambres() : int {
        return $this->nombreChambres;
    }

    public function setNombreChambres($nombreChambres) {
        $this->nombreChambres = $nombreChambres;
    }

}
