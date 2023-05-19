<?php
session_start();
require_once("../include/infos.inc.php");
require_once("../include/login.inc.php");
require_once("../include/saisie.inc.php");

/*  -------------------------------
            Requêtes SQL
------------------------------- */

$requestVisiteur = "SELECT id FROM compte.visiteur";
$resultRequestVisiteur = $connect->query($requestVisiteur);
if (!$resultRequestVisiteur) {
    print_r($connect->errorInfo());
}
$ligneVisiteur = $resultRequestVisiteur->fetch();

$requestFraisForfait = "SELECT montant FROM infos.fraisforfait";
$resultRequestFraisForfait = $connect->query($requestFraisForfait);
$ligneFraisForfait = $resultRequestFraisForfait->fetch();

// idFraisForfait
$reqETP = "SELECT id FROM infos.fraisforfait WHERE id = 'ETP'";
$reqKM = "SELECT id FROM infos.fraisforfait WHERE id = 'KM'";
$reqNUI = "SELECT id FROM infos.fraisforfait WHERE id = 'NUI'";
$reqREP = "SELECT id FROM infos.fraisforfait WHERE id = 'REP'";



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
$_SESSION["quantite"] = $nuit*$ligneFraisForfait["montant"] +
$etape*$ligneFraisForfait["montant"] + $km*$ligneFraisForfait["montant"] + $repasMidi*$ligneFraisForfait["montant"];

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

/*  -------------------------------
            Insertion BDD
------------------------------- */

try { 
    $reqInsert = "INSERT INTO saisies.saisieslignefraisforfait VALUES ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idKM', '$km'),
        ('$idVisiteur', '$mois', '$idNUI', '$nuit'),
        ('$idVisiteur', '$mois', '$idREP', '$repasMidi')";

    $insertRequest = $connect->exec($reqInsert);
} catch (Exception $e) {
    die("requête impossible" . $e->getMessage());
}
?>