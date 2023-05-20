<?php

session_start();
require_once("../include/saisie.inc.php");
// require_once("../include/login.inc.php");

// Variables
$idVisiteur = $_POST["lstVisiteur"];
$moisVisiteur = $_POST["dateValid"];

/*  -------------------------------
            Requêtes SQL
------------------------------- */

if(isset($idVisiteur ) && isset($moisVisiteur))
{
    $reqFFVisiteurETP = "SELECT quantite FROM saisies.saisieslignefraisforfait WHERE idVisiteur='$idVisiteur' AND  mois='$moisVisiteur' AND idFraisForfait='ETP'";
    $reqFFVisiteurKM = "SELECT quantite FROM saisies.saisieslignefraisforfait WHERE idVisiteur='$idVisiteur' AND  mois='$moisVisiteur' AND idFraisForfait='KM'";
    $reqFFVisiteurNUI = "SELECT quantite FROM saisies.saisieslignefraisforfait WHERE idVisiteur='$idVisiteur' AND  mois='$moisVisiteur' AND idFraisForfait='NUI'";
    $reqFFVisiteurREP = "SELECT quantite FROM saisies.saisieslignefraisforfait WHERE idVisiteur='$idVisiteur' AND  mois='$moisVisiteur' AND idFraisForfait='REP'";

    $resultFFVisiteurETP = $connectSaisie->query($reqFFVisiteurETP);
    $resultFFVisiteurKM = $connectSaisie->query($reqFFVisiteurKM);
    $resultFFVisiteurNUI = $connectSaisie->query($reqFFVisiteurNUI);
    $resultFFVisiteurREP = $connectSaisie->query($reqFFVisiteurREP);

    $ligneFFVisiteurETP = $resultFFVisiteurETP->fetch();
    $ligneFFVisiteurKM = $resultFFVisiteurKM->fetch();
    $ligneFFVisiteurNUI = $resultFFVisiteurNUI->fetch();
    $ligneFFVisiteurREP = $resultFFVisiteurREP->fetch();

    header("Location: ../../comptables/formValidFrais.php");

    $_SESSION["quantiteETP"] = $ligneFFVisiteurETP["quantite"];
    $_SESSION["quantiteKM"] = $ligneFFVisiteurKM["quantite"];
    $_SESSION["quantiteNUI"] = $ligneFFVisiteurNUI["quantite"];
    $_SESSION["quantiteREP"] = $ligneFFVisiteurREP["quantite"];

    // $reqHFVisiteur = "";

}
else
    header("Location: ../../comptables/formValidFrais.php");



?>