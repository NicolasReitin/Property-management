<?php
require_once '../classes/Terrain.php';
// use Property;
require_once '../common/conn.php';


// var_dump($_POST);

if (isset($_POST['projetTerrain']) && isset($_POST['villeTerrain']) && isset($_POST['surfaceTerrain']) && isset($_POST['prixTerrain'])){
    if (!empty($_POST['projetTerrain']) && !empty($_POST['villeTerrain']) && !empty($_POST['surfaceTerrain']) && !empty($_POST['prixTerrain'])){

        $projet = strip_tags($_POST['projetTerrain']);
        $ville = strip_tags($_POST['villeTerrain']);
        $surface = (int) strip_tags($_POST['surfaceTerrain']);
        $prix = (int) strip_tags($_POST['prixTerrain']);

        $terrain = new Terrain($projet, $ville, $surface, $prix);        

        $terrain->insertInto($pdo);

        header('location: ../index.php');

    }else{
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}