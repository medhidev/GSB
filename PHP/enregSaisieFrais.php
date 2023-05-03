<?php
    session_start();
    require_once("/include/connection.inc.php");
    require_once("/include/dataUser.inc.php");

    // Requête SQL
    $request = "SELECT id FROM visiteur WHERE login ='$loginStocke' AND mdp = '$mdpStocke'";
    $resultRequest = $connect->query($request);
    $ligneUser = $resultRequest->fetch();

    //Récupérer l'enssemble des données -> lignefraisforfait
    $idVisiteur = $ligneUser["id"];
    
    // Insertion BDD
   $reqInsert = "INSERT INTO lignefraisforfait (idVisiteur) VALUES ('$idVisiteur')";
?>