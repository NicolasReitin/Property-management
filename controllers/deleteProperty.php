<?php 
require_once '../common/conn.php'; // appel de la bdd
require_once '../models/Property.php'; // appel de la classe


// on select la ligne a delete
$query = "DELETE FROM `proprietes` WHERE `id` = ?"; 
// on prépare la requête
$request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));
// on execute la requete
$request->execute(array($_GET['id']));
// on redirige vers l'index
header('location: ../index.php');

?>
