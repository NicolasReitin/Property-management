<?php 
require_once '../common/conn.php';
require_once '../classes/Property.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>

<h1 class="text-center mb-5">Gestion de propriétés</h1>

<!-- formulaire de modification -->

<h2 class="mb-3 ms-5">Modifier la proprété</h2>

<?php

            $select = 'SELECT * FROM proprietes WHERE `id` ='.$_GET['id'];
            $request = $pdo->prepare($select);
            $request->execute();
            $property = $request->fetch();

            $type = $property['type'];
            $adresse  = $property['adresse'];
            $surface = $property['surface'];
            $prix = $property['prix'];

            $property = new Property($type, $adresse, $surface, $prix);

            switch ($property->getType()){
                case 'Terrain' :
                    // $property->setType() = 1;
                    $type = 1;
                    break;
                case "Maison" :
                    $type = 2;
                    break;
                case "Appartement" :
                    $type = 3;
                    break;
            }            
?>

<form action="#" method="post">
    <label class="ms-5" for="type"><h4>Type de bien</h4></label>
    <select name="type" class="form-select ms-5 mb-2" aria-label="Default select example" style="width: 500px">
        <option selected disabled hidden>Select type</option>
        <option value="1" <?= ($type == 1) ? 'selected' : '' ?> >Terrain</option>
        <option value="2" <?= ($type == 2) ? 'selected' : '' ?> >Maison</option>
        <option value="3" <?= ($type == 3) ? 'selected' : '' ?> >Appartement</option>
    </select>

    <label class="ms-5" for="adresse"> <h4>Adresse</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="adresse" id="adresse" style="width: 500px" value="<?= $property->getAdresse() ?>">

    <label class="ms-5" for="surface"> <h4>Surface (en m²)</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="surface" id="surface" style="width: 500px" value="<?= $property->getSurface() ?>">
    
    <label class="ms-5" for="prix"> <h4>Prix (en €)</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="prix" id="prix" style="width: 500px" value="<?= $property->getPrix() ?>">

    <button class="btn btn-warning ms-5 mt-3" type="submit">Modifier</button>

    <?php
        if(!empty($_POST)){

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
    
            // $query = "UPDATE `proprietes` SET `type`=".$newProperty->getType().",`adresse`=".$newProperty->getAdresse().",`surface`=".$newProperty->getSurface().",`prix`=".$newProperty->getPrix()."WHERE `id`=".$_GET['id']."";
    
            $query = "UPDATE `proprietes` SET `type`=?, `adresse`=?, `surface`=?, `prix`=? WHERE `id`= ?";
    
    
            $request = $pdo->prepare($query) or die(print_r($pdo->errorInfo()));
    
            $request->execute(array($newProperty->getType(), $newProperty->getAdresse(), $newProperty->getSurface(), $newProperty->getPrix(), $_GET['id']));

            header('location: ../index.php');
    
    
        }
        
    ?>


</form>

    
</body>
</html>