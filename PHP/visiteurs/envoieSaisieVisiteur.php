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
$reqETP = "SELECT id, montant FROM infos.fraisforfait WHERE id = 'ETP'";
$reqKM = "SELECT id, montant FROM infos.fraisforfait WHERE id = 'KM'";
$reqNUI = "SELECT id, montant FROM infos.fraisforfait WHERE id = 'NUI'";
$reqREP = "SELECT id, montant FROM infos.fraisforfait WHERE id = 'REP'";

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
$_SESSION["idVisiteur"] = $idVisiteur;
$mois = $_SESSION["mois"];

// Données saisies
$nuit = $_POST["FRA_NUIT"];
$etape = $_POST["FRA_ETAP"];
$km = $_POST["FRA_KM"];
$repasMidi = $_POST["FRA_REPAS"];

$idETP = $ligneETP["id"];
$idKM = $ligneKM["id"];
$idNUI = $ligneNUI["id"];
$idREP = $ligneREP["id"];

// Montant Forfait
$_SESSION["quantite"] = $nuit*$ligneNUI["montant"] +
$etape*$ligneETP["montant"] + $km*$ligneKM["montant"] + $repasMidi*$ligneREP["montant"];

/*  -------------------------------
            Insertion BDD
------------------------------- */

try {

    $reqInsertFK = "INSERT INTO saisies.saisieslignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$idVisiteur', '$mois', '$idETP', '$etape'),
        ('$idVisiteur', '$mois', '$idKM', '$km'),
        ('$idVisiteur', '$mois', '$idNUI', '$nuit'),
        ('$idVisiteur', '$mois', '$idREP', '$repasMidi')";

    $connectSaisie->exec($reqInsertFK);

} catch (Exception $e) {
    die("requête impossible" . $e->getMessage());
}

/*  -------------------------------
        Partie Hors Forfait
------------------------------- */

// Variables Hors Forfait
$libelle = $_POST["libelle"];
$date = $_SESSION["date"];
$_SESSION["quantite"] += $_POST["montant"];
$montant = $_SESSION["quantite"];
/*  -------------------------------
            Insertion BDD
------------------------------- */

$reqInsertHF = "INSERT INTO saisies.lignefraishorsforfait VALUES
    ('$idVisiteur', '$mois', '$libelle', '$date', '$montant')";

$resultHFInsert = $connectSaisie->exec($reqInsertHF);

// Affichage
echo $reqInsertFK.'<br>';
echo $reqInsertHF.'<br>';

/*  -------------------------------
    Envoie fiche frais → comptable
------------------------------- */

$reqNbJustificatif = "SELECT COUNT(*) FROM saisies.saisieslignefraisforfait WHERE idVisiteur='$idVisiteur'";
echo $reqNbJustificatif.'<br>';
$resultNbJustificatif = $connectSaisie->query($reqNbJustificatif);
$NbJustificatif = $resultNbJustificatif->fetch();
// erreur ici
$Justificatif = $NbJustificatif["COUNT(*)"];
echo $Justificatif.'<br>';

$reqInsertPK = "INSERT INTO saisies.fichefrais  VALUES ('$idVisiteur', '$mois', '$Justificatif', '$montant', '$date', NULL)";
$connectSaisie->exec($reqInsertPK);

echo $reqInsertPK.'<br>';

// echo "<script>alert('Votre commande a été envoyer avec succès !')</script>";
?>