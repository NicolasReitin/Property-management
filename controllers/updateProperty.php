<?php 
require_once '../common/conn.php';
require_once '../classes/Property.php';

    if(!empty($_POST)){
        var_dump($_GET['id']);

        $type = strip_tags($_POST['type']);
        $adresse = strip_tags($_POST['adresse']);
        $surface = (int) strip_tags($_POST['surface']);
        $prix = (int) strip_tags($_POST['prix']);

        switch ($type){
            case 1 :
                $type = "Terrain";
                break;
            case 2 :
                $type = "Maison";
                break;
            case 3 :
                $type = "Appartement";
                break;
        }
            
        $newProperty = new Property($type, $adresse, $surface, $prix);

        echo $newProperty->getPrix();

        $query = "UPDATE `proprietes` SET `type`=?, `adresse`=?, `surface`=?, `prix`=? WHERE `id`= ?";


        $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));

        $request->execute(array($newProperty->getType(), $newProperty->getAdresse(), $newProperty->getSurface(), $newProperty->getPrix(), $_GET['id']));

        header('location: ../index.php');
    }
?>    
</body>
</html>