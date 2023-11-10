<?php 
require_once '../common/conn.php'; // appel de la BDD
require_once '../models/Terrain.php';  // appel de la classe Terrain

    if(!empty($_POST)){
        // var_dump($_GET['id']);
        // die();

        // on récupère les valeurs du form via la méthod POST
        $projet = strip_tags($_POST['projetTerrain']);
        $ville = strip_tags($_POST['villeTerrain']);
        $surface = (int) strip_tags($_POST['surfaceTerrain']);
        $prix = (int) strip_tags($_POST['prixTerrain']);
            
        //on créé un nouvel objet Terrain
        $newTerrain = new Terrain($projet, $ville, $surface, $prix);

        // on utilise la fonction update de la classe pour mettre a jour les infos du new form
        $newTerrain->update($pdo);

        // on redirige vers l'index
        header('location: ../index.php');
    }
?>    
</body>
</html>