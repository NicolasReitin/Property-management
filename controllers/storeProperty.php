<?php
require_once '../classes/Property.php';
// use Property;
require_once '../common/conn.php';


// var_dump($_POST);

if (isset($_POST['type']) && isset($_POST['adresse']) && isset($_POST['surface']) && isset($_POST['prix'])){
    if (!empty($_POST['type']) && !empty($_POST['adresse']) && !empty($_POST['surface']) && !empty($_POST['prix'])){

        $type = strip_tags($_POST['type']);
        $adresse = strip_tags($_POST['adresse']);
        $surface = (int) strip_tags($_POST['surface']);
        $prix = (int) strip_tags($_POST['prix']);

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

        $query = "INSERT INTO `proprietes`(`type`, `adresse`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($property->getType(), $property->getAdresse(), $property->getSurface(), $property->getPrix()));

        header('location: ../index.php');

    }else{
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}