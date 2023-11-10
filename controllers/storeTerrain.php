<?php
require_once '../common/conn.php'; //appel de la bdd
require_once '../classes/Terrain.php'; // appel de la classe Terrain


// var_dump($_POST);

// vérification avant d'insert
if (isset($_POST['projetTerrain']) && isset($_POST['villeTerrain']) && isset($_POST['surfaceTerrain']) && isset($_POST['prixTerrain'])){
    if (!empty($_POST['projetTerrain']) && !empty($_POST['villeTerrain']) && !empty($_POST['surfaceTerrain']) && !empty($_POST['prixTerrain'])){
        //on récupère les valeur du form via la méthode POST
        $projet = strip_tags($_POST['projetTerrain']);
        $ville = strip_tags($_POST['villeTerrain']);
        $surface = (int) strip_tags($_POST['surfaceTerrain']);
        $prix = (int) strip_tags($_POST['prixTerrain']);

        // création de l'objet Terrain
        $terrain = new Terrain($projet, $ville, $surface, $prix);        

        // on insert les valeurs du form dans la bdd via la function insert into de la classe Terrain
        $terrain->insertInto($pdo);

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