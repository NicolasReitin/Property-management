<?php 
require_once '../common/conn.php';
require_once '../classes/Property.php';

    if(!empty($_POST)){
        // var_dump($_GET['id']);

        $terrain = strip_tags($_POST['terrain']);
        $adresse = strip_tags($_POST['adresseProperty']);
        $surface = (int) strip_tags($_POST['surfaceProperty']);
        $nbrDePieces = (int) strip_tags($_POST['piecesProperty']);
        $prix = (int) strip_tags($_POST['prixProperty']);

        $newProperty = new Property($terrain, $adresse, $surface, $nbrDePieces, $prix); 

        $newProperty->update($pdo);

        header('location: ../index.php');
    }
?>    
</body>
</html>