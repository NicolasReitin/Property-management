<?php

var_dump($_POST);

if (isset($_POST['type']) && isset($_POST['adresse']) && isset($_POST['surface']) && isset($_POST['prix'])){
    if (!empty($_POST['type']) && !empty($_POST['adresse']) && !empty($_POST['surface']) && !empty($_POST['prix'])){

        $type = strip_tags($_POST['type']);
        $adresse = strip_tags($_POST['surface']);
        $surface = strip_tags($_POST['surface']);
        $prix = strip_tags($_POST['prix']);



    }
}