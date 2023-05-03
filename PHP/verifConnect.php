<?php
  session_start();
  // Import du script de connection BDD
  require_once("/include/login.inc.php");
  require_once("/include/dataUser.inc.php");

  // Variables des champs de saisies
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Requêtes SQL
  $request = "SELECT * FROM visiteur WHERE login ='$login' AND mdp = '$password'";
  $resultRequest = $connect->query($request);
  $ligneUser = $resultRequest->fetch();

  if($_SESSION["connect"] == "sessionLogin")
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
      header('Location: ../index.php');
    }
  }

  else
  {
    header('Location: ../index.php');
  }
?>