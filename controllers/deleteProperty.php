<?php 
require_once '../common/conn.php';
require_once '../classes/Property.php';


//  
$query = "DELETE FROM `proprietes` WHERE `id` = ?";

$request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

$request->execute(array($_GET['id']));

header('location: ../index.php');

?>
