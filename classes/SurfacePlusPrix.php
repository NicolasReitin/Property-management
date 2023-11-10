<?php 
abstract class SurfacePlusPrix {
    public $surface;
    public $prix;

    public function __construct(string $surface, int $prix) {
        $this->surface = $surface;
        $this->prix = $prix;
    }




}