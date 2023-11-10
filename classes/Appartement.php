<?php 

class Appartement extends Property {
    private $nombrePieces;

    public function __construct($type, $adresse, $surface, $prix, $nombrePieces) {
        parent::__construct($type, $adresse, $surface, $prix);
        $this->nombrePieces = $nombrePieces;
    }

    public function getNombrePieces() : int {
        return $this->nombrePieces;
    }

    public function setNombrePieces($nombrePieces) {
        $this->nombrePieces = $nombrePieces;
    }


}