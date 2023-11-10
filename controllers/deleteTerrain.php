<?php 
require_once '../common/conn.php'; // appel de la bdd
require_once '../models/Terrain.php'; // appel de la classe Terrain


//  on ecris la requete selectionnant l'id a delete de la table terrains
$query = "DELETE FROM `terrains` WHERE `id` = ?";

// on prépare la requete
$request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));
// on execute la requete
$request->execute(array($_GET['id']));
// on redirige sur l'index
header('location: ../index.php');

?>
