<?php
  // Session de l'utilisateur
  session_start();

  // Import du script de connection BDD
  require_once("/include/login.inc.php");

  // Variables des champs de saisies
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Données de connection
  $_SESSION["Login"] = $login;
  $_SESSION["Password"] = $password;

  // Requêtes SQL
  $requestVisiteur = "SELECT * FROM compte.visiteur WHERE login ='$login' AND mdp = '$password'";
  $resultRequestVisiteur = $connect->query($requestVisiteur);
  $ligneVisiteur = $resultRequestVisiteur->fetch();

  $requestComptable = "SELECT * FROM compte.comptable WHERE login ='$login' AND mdp = '$password'";
  $resultRequestComptable = $connect->query($requestComptable);
  $ligneComptable = $resultRequestComptable->fetch();

  // Visiteur
  if($_SESSION["Login"] == $ligneVisiteur["login"] && $_SESSION["Password"] == $ligneVisiteur["mdp"])
  {
    $_SESSION["idVisiteur"] = $ligneVisiteur["id"];
    // Si l'utilisateur se trouve bien dans la BDD
    if($ligneVisiteur != false)
      header('Location: ../visiteurs/formSaisieFrais.php');

    else
      exit;
  }

  // Comptable
  else if ($_SESSION["Login"] == $ligneComptable["login"] && $_SESSION["Password"] == $ligneComptable["mdp"])
  {
    // Si l'utilisateur se trouve bien dans la BDD
    if($ligneComptable != false)
      header('Location: ../comptables/formValidFrais.php');

    else
      exit;
  }

  else
  {
    // Redirection vers la page de connection avec le message d'erreur
    $erreur = "Session invalide";
    header('Location: ../index.html?erreur='.urlencode($erreur));
    exit();
  }

  // Fonction de traitement en cas d'erreur
  function erreur($erreur)
  {
    $message = "<div style='color: red;'>Erreur <strong>".$erreur."</strong>, connection au service impossible</div>";
    return $message;
  }
?>