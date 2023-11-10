<?php 
require_once 'common/conn.php';
require_once 'classes/Terrain.php';

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

<h1 class="text-center mb-5">Modifier le terrain</h1>

<!-- formulaire de modification -->

<?php
            $select = 'SELECT * FROM terrains WHERE `id` ='.$_GET['id'];
            $request = $pdo->prepare($select);
            $request->execute();
            $terrain = $request->fetch();

            $type = $terrain['projet'];
            $adresse  = $terrain['ville'];
            $surface = $terrain['surface'];
            $prix = $terrain['prix'];

            $terrain = new Terrain($type, $adresse, $surface, $prix);
            
?>

<form action="controllers\updateTerrain.php?id=<?= $_GET['id'] ?>" method="post">
            <div class="form-group">
                <label class="ms-5" for="projetTerrain"><h4>Nom du projet</h4></label>
                <input class="form-control ms-5 mb-2" type="text" name="projetTerrain" id="projetTerrain" style="width: 500px" value="<?= $terrain->getProjet() ?>">
                <div class="col-sm-2">
                    <span class="retour" id="span_projetTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="villeTerrain"> <h4>Ville</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="villeTerrain" id="villeTerrain" style="width: 500px" value="<?= $terrain->getVille() ?>">
                    <span class="retour" id="span_villeTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="surfaceTerrain"> <h4>Surface (en m²)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="surfaceTerrain" id="surfaceTerrain" style="width: 500px" value="<?= $terrain->getSurface() ?>">
                    <span class="retour" id="span_surfaceTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="ms-5" for="prixTerrain"> <h4>Prix (en €)</h4></label>
                <div class="d-flex gap-2">
                    <input class="form-control ms-5 mb-2" type="text" name="prixTerrain" id="prixTerrain" style="width: 500px" value="<?= $terrain->getPrix() ?>">
                    <span class="retour" id="span_prixTerrain"></span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-warning ms-5 mt-3" type="submit">Modifier</button>
            </div>
        </form>

    
</body>
</html>