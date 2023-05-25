<?php
session_start();
require_once("../include/saisie.inc.php");


$dateConsult = $_POST["dateConsult"];
$reqSearch = "SELECT * FROM  saisies.lignefraishorsforfait LHF, saisies.saisieslignefraisforfait LFF, saisies.fichefrais FF
WHERE FF.mois = LFF.mois
AND FF.mois = LHF.mois
AND LHF.date='$dateConsult'";
$resultSearch = $connectSaisie->query($reqSearch);
$ligneConsult = $resultSearch->fetch();

// Récupération et affichage des données
$_SESSION["dateSearch"] = $ligneConsult["date"];


?>