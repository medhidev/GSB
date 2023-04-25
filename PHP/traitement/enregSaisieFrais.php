<?php
    require("../includes/connection.php");

    // function CalculFraisForfait()
    // {

    // }

    /*Récupération des valeurs*/
    //Saisies
    $periode = $_POST["FRA_PER"];
    $mois = $_POST["FRA_MOIS"];
    $annee = $_POST["FRA_AN"];

    //Frais forfait
    $repas = $_POST["FRA_REPAS"];
    $nuitee = $_POST["FRA_NUIT"];
    $etape = $_POST["FRA_ETAP"];
    $km = $_POST["FRA_KM"];

    // Requêtes
    $reqMontantREP = "SELECT montant FROM fraisforfait WHERE id = 'REP'";
    $reqMontantNUI = "SELECT montant FROM fraisforfait WHERE id = 'NUI'";
    $reqMontantETP = "SELECT montant FROM fraisforfait WHERE id = 'ETP'";
    $reqMontantKM = "SELECT montant FROM fraisforfait WHERE id = 'KM'";

    $REP = $connect->query($reqMontantREP);
    $NUI = $connect->query($reqMontantNUI);
    $ETP = $connect->query($reqMontantETP);
    $KM = $connect->query($reqMontantKM);

    //Hors forfait
    // Sera déjà compléter en fonction des valeurs
    $montant = float($repas)*$REP + float($nuitee)*$NUI + float($etape)*$ETP + float($km)*$KM;

    

    // $requestLF = "INSERT INTO TABLE fraisforfait VALUES()";
    // $requestPer = "INSERT INTO TABLE periode VALUES()";
    // $requestLHF = "INSERT INTO TABLE fraisforfait VALUES()";

?>