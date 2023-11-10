<?php 
require_once '../common/conn.php';
require_once '../classes/Terrain.php';


//  
$query = "DELETE FROM `terrains` WHERE `id` = ?";

$request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

$request->execute(array($_GET['id']));

header('location: ../index.php');

?>
