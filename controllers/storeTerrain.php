<?php
require_once '../classes/Property.php';
// use Property;
require_once '../common/conn.php';


// var_dump($_POST);

if (isset($_POST['projetTerrain']) && isset($_POST['adresseTerrain']) && isset($_POST['surfaceTerrain']) && isset($_POST['prixTerrain'])){
    if (!empty($_POST['projetTerrain']) && !empty($_POST['adresseTerrain']) && !empty($_POST['surfaceTerrain']) && !empty($_POST['prixTerrain'])){

        $type = strip_tags($_POST['projetTerrain']);
        $adresse = strip_tags($_POST['adresseTerrain']);
        $surface = (int) strip_tags($_POST['surfaceTerrain']);
        $prix = (int) strip_tags($_POST['prixTerrain']);

        switch ($type){
            case 1 :
                $type = "Terrain";
                break;
            case 2 :
                $type = "Maison";
                break;
            case 3 :
                $type = "Appartement";
                break;
        }
        

        $property = new Property($type, $adresse, $surface, $prix);        

        // $query = "INSERT INTO `proprietes`(`type`, `adresse`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        // $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        // $request->execute(array($property->getType(), $property->getAdresse(), $property->getSurface(), $property->getPrix()));

        $property->insertInto($pdo, $property);

        // header('location: ../index.php');

    }else{
        // header('Location: ../index.php');
    }
}else{
    // header('Location: ../index.php');
}