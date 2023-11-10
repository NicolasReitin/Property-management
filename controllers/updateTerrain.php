<?php 
require_once '../common/conn.php';
require_once '../classes/Terrain.php';

    if(!empty($_POST)){
        // var_dump($_GET['id']);
        // die();

        $projet = strip_tags($_POST['projetTerrain']);
        $ville = strip_tags($_POST['villeTerrain']);
        $surface = (int) strip_tags($_POST['surfaceTerrain']);
        $prix = (int) strip_tags($_POST['prixTerrain']);
            
        $newTerrain = new Terrain($projet, $ville, $surface, $prix);

        $query = "UPDATE `terrains` SET `projet`=?, `ville`=?, `surface`=?, `prix`=? WHERE `id`= ?";
        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($newTerrain->getProjet(), $newTerrain->getVille(), $newTerrain->getSurface(), $newTerrain->getPrix(), $_GET['id']));

        header('location: ../index.php');
    }
?>    
</body>
</html>