<?php

require_once '../common/conn.php';

var_dump($_POST);

if (isset($_POST['type']) && isset($_POST['adresse']) && isset($_POST['surface']) && isset($_POST['prix'])){
    if (!empty($_POST['type']) && !empty($_POST['adresse']) && !empty($_POST['surface']) && !empty($_POST['prix'])){

        $type = strip_tags($_POST['type']);
        $adresse = strip_tags($_POST['adresse']);
        $surface = strip_tags($_POST['surface']);
        $prix = strip_tags($_POST['prix']);

        $query = "INSERT INTO `proprietes`(`type`, `adresse`, `surface`, `prix`) VALUES (?, ?, ?, ?)";
        $request = $pdo->prepare($query) or die(print_r($bdd->errorInfo()));
        $request->execute(array($type, $adresse, $surface, $prix));

        var_dump($request);


    }
}