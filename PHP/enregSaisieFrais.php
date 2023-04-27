<?php
    require_once("/include/connection.inc.php");

    // Recuperation des données via d'autres tables
    $request = "SELECT id FROM visiteur WHERE login ='$login' AND mdp = '$password'";
    $resultRequest = $connect->query($request);
    $ligne = $resultRequest->fetch();

    //Récupérer l'enssemble des données -> lignefraisforfait
    $idVisiteur = $ligne["id"];
    $mois = $_POST["FRA_MOIS"];
    $idFrais = $_POST[""];
    $quantite = $_POST[""];

    echo $idVisiteur;

?>