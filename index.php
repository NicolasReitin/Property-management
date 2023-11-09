<?php 
require_once 'common/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<!-- Gestionnaire de propriétés :
Développez un gestionnaire de produits où vous pouvez ajouter, modifier et supprimer des produits. 
Chaque produit peut être une instance d'une classe. -->
<h1 class="text-center mb-5">Gestion de propriétés</h1>
<?php //BDD connected to server
    // require_once('common/conn.php');
    // if ($bdd){
    //     echo 'connected';
    // }else{
    //     echo 'disconnected';
    // }


?>
    

<!-- formulaire d'ajout -->
<h2 class="mb-3 ms-5">Ajouter une proprété</h2>
<form action="controllers\addProperty.php" method="post">
    <label class="ms-5" for="type"><h4>Type de bien</h4></label>
    <select name="type" class="form-select ms-5 mb-2" aria-label="Default select example" style="width: 500px">
        <option selected>Select type</option>
        <option value="1">Terrain</option>
        <option value="2">Maison</option>
        <option value="3">Appartement</option>
    </select>

    <label class="ms-5" for="adresse"> <h4>Adresse</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="adresse" id="adresse" style="width: 500px">

    <label class="ms-5" for="surface"> <h4>Surface (en m²)</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="surface" id="surface" style="width: 500px">
    
    <label class="ms-5" for="prix"> <h4>Prix (en €)</h4></label>
    <input class="form-control ms-5 mb-2" type="text" name="prix" id="prix" style="width: 500px">

    <button class="btn btn-success ms-5 mt-3" type="submit">Ajouter</button>
</form>

<hr>

<!-- liste de maison -->
<h2 class="mb-3 ms-5">Liste des propriétées</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Type de bien</th>
            <th scope="col">Adresse</th>
            <th scope="col">Surface (en m²)</th>
            <th scope="col">Prix (en €)</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $select = 'SELECT * FROM proprietes';
            $request = $pdo->prepare($select);
            $request->execute();
            $properties = $request->fetchAll();

            foreach ($properties as $property) {
                ?>
                <tr>
                    <th scope="row"><?= $property['id'] ?></th>
                    <td><?= $property['type'] ?></td>
                    <td><?= $property['adresse'] ?></td>
                    <td><?= $property['surface'] ?></td>
                    <td><?= $property['prix'] ?></td>
                    <td><a href="controllers/editProperty.php?id=<?=$property['id']?>"><button class="btn btn-warning" type="button">Edit</button></a></td>
                    <td><a href="controllers/editProperty.php?id=<?=$property['id']?>"><button class="btn btn-danger" type="button">X</button></a></td>
                </tr>

                <?php
                
            }
        ?>
        
    </tbody>
</table>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>