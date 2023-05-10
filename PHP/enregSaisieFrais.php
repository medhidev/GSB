<?php
    session_start();
    require_once("/include/connection.inc.php");

    // Requête SQL
    $login = $_SESSION["connectLogin"];
    $mdp = $_SESSION["connectMdp"];

    $request = "SELECT id FROM visiteur WHERE login ='$login' AND mdp = '$mdp'";
    $resultRequest = $connect->query($request);
    $ligneUser = $resultRequest->fetch();

    //Récupérer l'enssemble des données -> lignefraisforfait
    $idVisiteur = $ligneUser["id"];
    $mois = $_POST["FRA_MOIS"];
    $quantite = $_POST["FRA_AUT_MONT"];
    
    // Insertion BDD
   $reqInsert = "INSERT INTO lignefraisforfait (idVisiteur, mois, quantite) VALUES ('$idVisiteur', '$mois', '$quantite')";
   $insertRequest = $connect->exec($reqInsert);

?>