<?php
    session_start();
    require_once("/include/connection.inc.php");

    // Requête SQL
    $login = $_SESSION["connectLogin"];
    $mdp = $_SESSION["connectMdp"];

    $request = "SELECT id FROM visiteur WHERE login ='$login' AND mdp = '$mdp'";
    $resultRequest = $connect->query($request);
    $ligneUser = $resultRequest->fetch();

    // Récupérer l'enssemble des données -> lignefraisforfait
    $idVisiteur = $ligneUser["id"];
    $mois = date('m');

    // saisie de m'utilisateur
    $nuit = $_POST["FRA_NUIT"];
    $etape = $_POST["FRA_ETAP"];
    $km = $_POST["FRA_KM"];
    $repasMidi = $_POST["FRA_REPAS"];
    $_SESSION["quantite"] = $nuit + $etape + $km + $repasMidi;

    // idFraisForfait
    $reqETP = "SELECT id FROM fraisforfait WHERE id = 'ETP'";
    $reqKM = "SELECT id FROM fraisforfait WHERE id = 'KM'";
    $reqNUI = "SELECT id FROM fraisforfait WHERE id = 'NUI'";
    $reqREP = "SELECT id FROM fraisforfait WHERE id = 'REP'";

    $resultreqETP = $connect->query($reqETP);
    $resultreqKM = $connect->query($reqKM);
    $resultreqNUI = $connect->query($reqNUI);
    $resultreqREP = $connect->query($reqREP);

    $ligneETP = $resultreqETP->fetch();
    $ligneKM = $resultreqKM->fetch();
    $ligneNUI = $resultreqNUI->fetch();
    $ligneREP = $resultreqREP->fetch();

    $idETP = $ligneETP["id"];
    $idKM = $ligneKM["id"];
    $idNUI = $ligneNUI["id"];
    $idREP = $ligneREP["id"];


    // Insertion BDD
   $reqInsert = "INSERT INTO lignefraisforfait  VALUES ('$idVisiteur', '$mois', '$idETP', '$etape'),
   ('$idVisiteur', '$mois', '$idKM', '$km'),
   ('$idVisiteur', '$mois', '$idNUI', '$nuit'),
   ('$idVisiteur', '$mois', '$idREP', '$repasMidi')";

   $insertRequest = $connect->exec($reqInsert);
   echo '<div style="color:''">'.'Envoie du formulaire avec succes !'.'</div>'

?>