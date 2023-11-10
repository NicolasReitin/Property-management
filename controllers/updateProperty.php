<?php 
require_once '../common/conn.php'; // appel de la BDD
require_once '../classes/Property.php';  // appel de la classe Property

    if(!empty($_POST)){
        // var_dump($_GET['id']);

        // on récupère les valeurs du form via la méthod POST
        $terrain = strip_tags($_POST['terrain']);
        $adresse = strip_tags($_POST['adresseProperty']);
        $surface = (int) strip_tags($_POST['surfaceProperty']);
        $nbrDePieces = (int) strip_tags($_POST['piecesProperty']);
        $prix = (int) strip_tags($_POST['prixProperty']);

        //on créé un nouvel objet Property
        $newProperty = new Property($terrain, $adresse, $surface, $nbrDePieces, $prix); 

        // on utilise la fonction update de la classe pour mettre a jour les infos du new form
        $newProperty->update($pdo);

        // on redirige vers l'index
        header('location: ../index.php');
    }
?>    
</body>
</html>