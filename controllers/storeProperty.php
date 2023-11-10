<?php
require_once '../classes/Property.php';
// use Property;
require_once '../common/conn.php';


var_dump($_POST);
// die();

if (isset($_POST['terrain']) && isset($_POST['adresseProperty']) && isset($_POST['surfaceProperty']) && isset($_POST['piecesProperty']) && isset($_POST['prixProperty'])){

    if (!empty($_POST['terrain']) && !empty($_POST['adresseProperty']) && !empty($_POST['surfaceProperty']) && !empty($_POST['piecesProperty']) && !empty($_POST['prixProperty'])){

        $terrain = strip_tags($_POST['terrain']);
        $adresse = strip_tags($_POST['adresseProperty']);
        $surface = (int) strip_tags($_POST['surfaceProperty']);
        $nbrDePieces = (int) strip_tags($_POST['piecesProperty']);
        $prix = (int) strip_tags($_POST['prixProperty']);
    
        $property = new Property($terrain, $adresse, $surface,$nbrDePieces, $prix);    

        $property->insertInto($pdo, $property);

        header('location: ../index.php');

    }else{
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}