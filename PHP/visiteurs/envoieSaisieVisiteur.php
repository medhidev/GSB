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
    $reqInsertPK = "INSERT INTO saisies.fichefrais (idVisiteur, mois) VALUES ('$idVisiteur', '$mois'),
        ('$idVisiteur', '$mois'),
        ('$idVisiteur', '$mois'),
        ('$idVisiteur', '$mois')";

    $reqInsertFK = "INSERT INTO saisies.saisieslignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idETP', '$etape')";

    $connectSaisie->exec($reqInsertPK);
    $connectSaisie->exec($reqInsertFK);

    $affected = $connectSaisie->exec($sql);
    $err = $connectSaisie->errorInfo();
    $err = $connectSaisie->errorInfo();
    var_dump($err);

    echo "la requête a été envoyé avec succès !"."<br>";
    echo $reqInsertPK;
    echo $reqInsertFK;

} catch (Exception $e) {
    die("requête impossible" . $e->getMessage());
}
?>