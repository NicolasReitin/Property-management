<?php 
require_once 'common/conn.php'; //appel de la bdd

// select tous les terrains pour les afficher dans le tableau et les options du select
$select = 'SELECT * FROM terrains ORDER BY `ville` ASC';
$request = $pdo->prepare($select);
$request->execute();
$terrains = $request->fetchAll(); //récupère le résultat

// select toutes les propriétés de la BDD
$select = 'SELECT * FROM proprietes ORDER BY `id` DESC';
$request = $pdo->prepare($select);
$request->execute();
$properties = $request->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Gestion de propriétés</title>
</head>
<body>

<h1 class="text-center mb-5">Gestion de propriétés</h1>

<!-- formulaire d'ajout -->
<div class="containerOne d-flex justify-content-center gap-5">
    <div class="addGround">
        <h2 class="mb-3 ms-5">NOUVEAU TERRAIN</h2>
        <hr>
        <form action="controllers\storeTerrain.php" method="post">
            <div class="form-group">
                <label class="ms-5" for="projetTerrain"><h4>Nom du projet</h4></label>
                <input class="form-control ms-5 mb-2" type="text" name="projetTerrain" id="projetTerrain" style="width: 500px">
                <div class="col-sm-2">
                    <span class="retour" id="span_projetTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="villeTerrain"> <h4>Ville</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="villeTerrain" id="villeTerrain" style="width: 500px">
                    <span class="retour" id="span_villeTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="surfaceTerrain"> <h4>Surface (en m²)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="surfaceTerrain" id="surfaceTerrain" style="width: 500px">
                    <span class="retour" id="span_surfaceTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="prixTerrain"> <h4>Prix (en €)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="prixTerrain" id="prixTerrain" style="width: 500px">
                    <span class="retour" id="span_prixTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-secondary ms-5 mt-3" type="submit">Ajouter</button>
            </div>
        </form>
    </div>

    
    <div class="addProperty">
    <h2 class="mb-3 ms-5">NOUVELLE PROPRIETE</h2>
    <hr>
        <form action="controllers\storeProperty.php" method="post">
            <div class="form-group">
                <label class="ms-5" for="terrain"><h4>Terrain</h4></label>
                <select name="terrain" class="form-select ms-5 mb-2" aria-label="Default select example" style="width: 500px">
                    <option selected disabled hidden>Selectionner le terrain</option>
                    <?php 
                    //options selon les terrains de la BDD
                        foreach ($terrains as $terrain) {
                            echo '<option value="'.$terrain['id'].' ">'.$terrain['projet'].' - '.$terrain['ville'].'</option>';
                        }
                    ?>
                </select>
                <div class="col-sm-2">
                    <span class="retour" id="span_type"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="adresseProperty"> <h4>Adresse</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="adresseProperty" id="adresseProperty" style="width: 500px">
                    <span class="retour" id="span_adresseProperty"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="surfaceProperty"> <h4>Surface (en m²)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="surfaceProperty" id="surfaceProperty" style="width: 500px">
                    <span class="retour" id="span_surfaceProperty"></span>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <label class="ms-5" for="piecesProperty"> <h4>Nombre de pièces</h4></label>
                    <div class="d-flex gap-2">
                        <input class="form-control ms-5 mb-2" type="text" name="piecesProperty" id="piecesProperty" style="width: 225px">
                        <span class="retour" id="span_piecesProperty"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ms-5" for="prixProperty"> <h4>Prix (en €)</h4></label>
                    <div class="d-flex gap-2">
                        <input class="form-control ms-5 mb-2" type="text" name="prixProperty" id="prixProperty" style="width: 225px">
                        <span class="retour" id="span_prixProperty"></span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button class="btn btn-secondary ms-5 mt-3" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<hr>


    <!-- liste des terrain et maisons -->

    <div class="containerTwo d-flex justify-content-center gap-5">
    <?php

        if ($terrains){ //affichage de la partie tableau uniquement s'il y a des terrains dans la bdd
            ?>
            <div>
                <h2 class="mb-3 ms-5">Liste des terrains</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom du projet</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Surface (en m²)</th>
                            <th scope="col">Prix (en €)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // tableau avec les valeur de la BDD avec un foreach pour toutes les faire apparaitre
                            foreach ($terrains as $terrain) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $terrain['id'] ?></th>
                                    <td><?= $terrain['projet'] ?></td>
                                    <td><?= $terrain['ville'] ?></td>
                                    <td><?= $terrain['surface'] ?></td>
                                    <td><?= $terrain['prix'] ?></td>
        
                                    <td>
                                        <a href="editterrain.php?id=<?= $terrain['id'] ?>">
                                            <button class="btn btn-warning" type="button">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="controllers/deleteterrain.php?id=<?= $terrain['id'] ?>">
                                            <button class="btn btn-danger" type="button">X</button>
                                        </a>
                                    </td>                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        if ($properties){ //affichage de la partie tableau uniquement s'il y a des terrains dans la bdd
        ?>
    
        <div>
            <h2 class="mb-3 ms-5">Liste des propriétées</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom du terrain</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Surface (en m²)</th>
                        <th scope="col">Nombre de pièces</th>
                        <th scope="col">Prix (en €)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php    
                        foreach ($properties as $property) {
                            ?>
                            <tr>
                                <th scope="row"><?= $property['id'] ?></th>
                                <td><?= $property['terrain'] ?></td>
                                <td><?= $property['adresse'] ?></td>
                                <td><?= $property['surface'] ?></td>
                                <td><?= $property['piece'] ?></td>
                                <td><?= $property['prix'] ?></td>
    
                                <td>
                                    <!-- affiche un bouton et on lui rajoute dans l'url de destination l'id pour le récupérer dans le store -->
                                    <a href="editProperty.php?id=<?= $property['id'] ?>">
                                        <button class="btn btn-warning" type="button">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="controllers/deleteProperty.php?id=<?= $property['id'] ?>">
                                        <button class="btn btn-danger" type="button">X</button>
                                    </a>
                                </td>                </tr>
    
    
                            <?php
                            
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <?php
        }
        ?>
    
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js\script.js"></script>

</body>
</html>