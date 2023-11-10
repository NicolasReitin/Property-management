<?php
require_once '../common/conn.php'; // appel de la bdd
require_once '../models/Property.php'; // appel de la classe Property


// var_dump($_POST);

// vérification avant d'insert
if (isset($_POST['terrain']) && isset($_POST['adresseProperty']) && isset($_POST['surfaceProperty']) && isset($_POST['piecesProperty']) && isset($_POST['prixProperty'])){

    if (!empty($_POST['terrain']) && !empty($_POST['adresseProperty']) && !empty($_POST['surfaceProperty']) && !empty($_POST['piecesProperty']) && !empty($_POST['prixProperty'])){
        //on récupère les valeur du form via la méthode POST
        $terrain = strip_tags($_POST['terrain']);
        $adresse = strip_tags($_POST['adresseProperty']);
        $surface = (int) strip_tags($_POST['surfaceProperty']);
        $nbrDePieces = (int) strip_tags($_POST['piecesProperty']);
        $prix = (int) strip_tags($_POST['prixProperty']);

        // création de l'objet Property
        $property = new Property($terrain, $adresse, $surface,$nbrDePieces, $prix);   

        // on insert les valeurs du form dans la bdd via la function insert into de la classe Property
        $property->insertInto($pdo, $property);

        // on redirige vers l'index
        header('location: ../index.php');

    }else{
        // on devrait rediriger vers l'index en signalant les erreurs à l'utilisateur
        header('Location: ../index.php');
    }
}else{
    // on devrait rediriger vers l'index en signalant les erreurs à l'utilisateur
    header('Location: ../index.php');
}