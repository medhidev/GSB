<?php
session_start();
require_once("../include/infos.inc.php");
require_once("../include/login.inc.php");
require_once("../include/saisie.inc.php");

/*  -------------------------------
        Partie Frais Forfait
------------------------------- */

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

$idETP = $ligneETP["id"];
$idKM = $ligneKM["id"];
$idNUI = $ligneNUI["id"];
$idREP = $ligneREP["id"];

/*  -------------------------------
            Insertion BDD
------------------------------- */

try {
    $reqInsertPK = "INSERT INTO saisies.fichefrais (idVisiteur, mois) VALUES ('$idVisiteur', '$mois')";
    // code pour éviter la duplication

    $connectSaisie->exec($reqInsertPK);

    $reqAfficheFicheFrais = "SELECT * FROM saisies.fichefrais";
    $resultSaisie = $connectSaisie->query($reqAfficheFicheFrais);
    $AfficheFichefrais = $resultSaisie->fetch();

    $idVisiteurBDD = $AfficheFichefrais["idVisiteur"];
    $moisBDD = $AfficheFichefrais["mois"]; 

    $reqInsertFK = "INSERT INTO saisies.saisieslignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$idVisiteurBDD', '$moisBDD', '$idETP', '$etape'),
        ('$idVisiteurBDD', '$moisBDD', '$idKM', '$km'),
        ('$idVisiteurBDD', '$moisBDD', '$idNUI', '$nuit'),
        ('$idVisiteurBDD', '$moisBDD', '$idREP', '$repasMidi')";

    $connectSaisie->exec($reqInsertFK);

} catch (Exception $e) {
    die("requête impossible" . $e->getMessage());
}

/*  -------------------------------
        Partie Hors Forfait
------------------------------- */

// Libelle et date HF
$libelle = $_POST["FRA_AUT_LIB1"];
$date = (string)date('d.m.Y');

// Montant total
$_SESSION["quantite"] = $nuit*$_SESSION["prixNuit"] +
$etape*$_SESSION["prixEtape"] + $km*$_SESSION["prixKm"] + $repasMidi*$_SESSION["prixRepas"];
$montant = $_SESSION["quantite"];

/*  -------------------------------
            Insertion BDD
------------------------------- */

$reqInsertHF = "INSERT INTO saisies.lignefraishorsforfait VALUES
    ('$idVisiteurBDD', '$moisBDD', '$libelle', '$date', '$montant')";

$resultHFInsert = $connectSaisie->exec($reqInsertHF);


// Affichage
echo $reqInsertPK.'<br>';
echo $reqInsertFK.'<br>';
echo $reqInsertHF.'<br>';




?>