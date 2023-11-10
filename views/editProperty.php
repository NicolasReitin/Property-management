<?php 
require_once '../common/conn.php'; // appel de la BDD
require_once '../models/Property.php'; // appel de la classe Property

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
// select l'ensemble des terrain pour les afficher dans le select 
    $selectAll = 'SELECT * FROM proprietes';
    $requestAll = $pdo->prepare($selectAll);
    $requestAll->execute();
    $properties = $requestAll->fetchAll();

// select le terrain avec l'id envoyé par la méthode GET afin de l'afficher
    $select = 'SELECT * FROM proprietes WHERE `id` ='.$_GET['id'];
    $request = $pdo->prepare($select);
    $request->execute();
    $property = $request->fetch();

    $id = $property['id'];
    $terrain = $property['terrain'];
    $adresse  = $property['adresse'];
    $surface = $property['surface'];
    $nbrDePieces = $property['piece'];
    $prix = $property['prix'];

    // appel de la classe Property avec son constructeur
    $property = new Property($terrain, $adresse, $surface,$nbrDePieces, $prix);   

    // utilisation des la classe puis pré-affichage des informations récupérées en BDD dans les input 
?>

<form action="../controllers\updateProperty.php?id=<?= $id ?>" method="post">
            <div class="form-group">
                <label class="ms-5" for="terrain"><h4>Terrain</h4></label>
                <select name="terrain" class="form-select ms-5 mb-2" aria-label="Default select example" style="width: 500px">
                    <option selected value="<?= $id ?>"><?= $terrain ." - ". $adresse ?></option>
                    <?php 
                    //options selon les terrains de la BDD
                        foreach ($properties as $propriete) {
                            ?>
                                <option value="<?= $propriete['id'] ?>">
                                    <?= $propriete['terrain']." - ".$propriete['adresse']?>
                                </option>

                            <?php
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
                    <input class="form-control ms-5 mb-2" type="text" name="adresseProperty" id="adresseProperty" style="width: 500px" value="<?= $adresse ?>">
                    <span class="retour" id="span_adresseProperty"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="surfaceProperty"> <h4>Surface (en m²)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="surfaceProperty" id="surfaceProperty" style="width: 500px" value="<?= $surface ?>">
                    <span class="retour" id="span_surfaceProperty"></span>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <label class="ms-5" for="piecesProperty"> <h4>Nombre de pièces</h4></label>
                    <div class="d-flex gap-2">
                        <input class="form-control ms-5 mb-2" type="text" name="piecesProperty" id="piecesProperty" style="width: 225px" value="<?= $nbrDePieces ?>">
                        <span class="retour" id="span_piecesProperty"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="ms-5" for="prixProperty"> <h4>Prix (en €)</h4></label>
                    <div class="d-flex gap-2">
                        <input class="form-control ms-5 mb-2" type="text" name="prixProperty" id="prixProperty" style="width: 225px" value="<?= $prix ?>">
                        <span class="retour" id="span_prixProperty"></span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button class="btn btn-warning ms-5 mt-3" type="submit">Modifier</button>
            </div>
        </form>

    
</body>
</html>