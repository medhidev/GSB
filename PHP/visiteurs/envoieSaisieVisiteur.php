<?php
session_start();
require_once("../include/infos.inc.php");
require_once("../include/login.inc.php");
require_once("../include/saisie.inc.php");

/*  -------------------------------
            Requêtes SQL
------------------------------- */

$login = $_SESSION["Login"];
$requestVisiteur = "SELECT id FROM compte.visiteur WHERE login='$login'";
$resultRequestVisiteur = $connect->query($requestVisiteur);
$ligneVisiteur = $resultRequestVisiteur->fetch();

// idFraisForfait
$reqETP = "SELECT id FROM infos.fraisforfait WHERE id = 'ETP'";
$reqKM = "SELECT id FROM infos.fraisforfait WHERE id = 'KM'";
$reqNUI = "SELECT id FROM infos.fraisforfait WHERE id = 'NUI'";
$reqREP = "SELECT id FROM infos.fraisforfait WHERE id = 'REP'";

$resultreqETP = $connectInfo->query($reqETP);
$resultreqKM = $connectInfo->query($reqKM);
$resultreqNUI = $connectInfo->query($reqNUI);
$resultreqREP = $connectInfo->query($reqREP);

$ligneETP = $resultreqETP->fetch();
$ligneKM = $resultreqKM->fetch();
$ligneNUI = $resultreqNUI->fetch();
$ligneREP = $resultreqREP->fetch();

/*  -------------------------------
        Données utilisateur
------------------------------- */

// Récupérer l'enssemble des données
$idVisiteur = $ligneVisiteur["id"];
$mois = date('m');

// Données saisies
$nuit = $_POST["FRA_NUIT"];
$etape = $_POST["FRA_ETAP"];
$km = $_POST["FRA_KM"];
$repasMidi = $_POST["FRA_REPAS"];

// Sauvegarder pour accès au comptable
$_SESSION["quantite"] = $nuit*$_SESSION["prixNuit"] +
$etape*$_SESSION["prixEtape"] + $km*$_SESSION["prixKm"] + $repasMidi*$_SESSION["prixRepas"];

$idETP = $ligneETP["id"];
$idKM = $ligneKM["id"];
$idNUI = $ligneNUI["id"];
$idREP = $ligneREP["id"];

/*  -------------------------------
            Insertion BDD
------------------------------- */

try { 
    $reqInsert = "INSERT INTO saisies.saisieslignefraisforfait VALUES ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idKM', '$km'),
        ('$idVisiteur', '$mois', '$idNUI', '$nuit'),
        ('$idVisiteur', '$mois', '$idREP', '$repasMidi')";

    $connectSaisie->exec($reqInsert);
    echo "la requête a été envoyé avec succès !"."<br>";
    echo $reqInsert;

} catch (Exception $e) {
    die("requête impossible" . $e->getMessage());
}
?>