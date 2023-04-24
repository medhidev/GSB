<?php
    //Connection BDD (Administrateur)
    $host = "localhost";
    $nomBdd = "gsb";
    $login = "AdminGSB";
    $passwordBdd = "adminpassword";

    // Connection BDD
    try {
        $connect = new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
    }
    catch(Exception $e){
        die ("Connection Impossible avec '$host'".$e->getMessage());
    }

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

    //Hors forfait
    // Sera déjà compléter en fonction des valeurs

    $requestLF = "INSERT INTO TABLE fraisforfait VALUES()";
    $requestPer = "INSERT INTO TABLE periode VALUES()";
    $requestLHF = "INSERT INTO TABLE fraisforfait VALUES()";

?>