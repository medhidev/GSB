<?php
  //import script de connexion BDD
  require("\includes\connexion.php");

  // Variables des champs de saisies
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Requêtes SQL
<<<<<<< HEAD
  $request = "SELECT * FROM visiteur WHERE login ='$login' AND mdp = '$password'";
=======
  $request = "SELECT mdp, compta FROM visiteur WHERE login ='$login' AND mdp='$password'";
>>>>>>> 46f446075c1e07cf27bacc07929ca7e49e6f9064
  $resultRequest = $connect->query($request);
  //verification pour chaque ligne de la BDD 
  $ligne = $resultRequest->fetch();
  
  // Si l'utilisateur se trouve bien dans la BDD
  if($ligne != false){

    // Si l'utilsateur est un compte 'compta'
    if($ligne['compta'] == 'OUI'){

      //redirection vers la page compta
      header('Location: ../formValidFrais.php');
    }
    else{
      //redirection vers la page visiteur
      header('Location: ../formSaisieFrais.php');
    }
  }
  else{
    //retourner vers la page de départ

    header('Location: ../index.html');
<<<<<<< HEAD
=======

    echo "Votre saisie est incorrecte";

    //  avertir l'utilisateur
    // faire un script Js

>>>>>>> 46f446075c1e07cf27bacc07929ca7e49e6f9064
  } 
?>