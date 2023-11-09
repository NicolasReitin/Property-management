<?php 

$host = "localhost";
$database = "gestion_maisons";
$username = "root";
$password = "";

try
{
    $pdo=new PDO('mysql:host=localhost;dbname=gestion_maisons','root','');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

