<?php
  // Session de l'utilisateur
  session_start();

  // Import du script de connection BDD
  require_once("/include/login.inc.php");

  // Variables des champs de saisies
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Données de connection
  $_SESSION["connectLogin"] = $login;
  $_SESSION["connectMdp"] = $password;

  // Requêtes SQL
  $request = "SELECT * FROM visiteur WHERE login ='$login' AND mdp = '$password'";
  $resultRequest = $connect->query($request);
  $ligneUser = $resultRequest->fetch();

  if($_SESSION["connectLogin"] == $login && $_SESSION["connectMdp"] == $password)
  {
    // Si l'utilisateur se trouve bien dans la BDD
    if($ligneUser != false)
    {
      // Si l'utilsateur est un comptable
      if($ligneUser['compta'] == 'OUI')
      {
        header('Location: ../comptables/formValidFrais.php');
      }

      else
      {
        header('Location: ../visiteurs/formSaisieFrais.php');
      }
    }

    else
    {
      // Retourner vers la page de login
      header('Location: ../index.html');
      echo erreur("Utilisateur Invalide");
    }
  }

  else
  {
    header('Location: ../index.html');
    echo erreur("Session Invalide");
  }

  // Fonction de traitement en cas d'erreur
  function erreur($erreur)
  {
    $message = "<div style='color: red;'>Erreur <strong>".$erreur."</strong>, connection au service impossible</div>";
    return $message;
  }
?>