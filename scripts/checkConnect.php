<?php
  //import script de connexion BDD
  require("\includes\connexion.php");

  // Variables
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Requêtes SQL
  $request = "SELECT mdp, compta FROM visiteur WHERE login ='$login'";
  $resultRequest = $connect->query($request);

  //verification pour chaque ligne de la BDD 
  $ligne = $resultRequest->fetch();
  
  // Si l'utilisateur se trouve bien dans la BDD
  if($ligne != false){
    echo $login.'<br>'.$ligne['mdp'].'<br>';

    // Si l'utilsateur est un compte 'compta'
    if($ligne['compta'] == 'OUI'){

      //redirection vers la page compta
      header('Location: ../formValidFrais.php');
    }
    else{
      //redirection vers la page user
      header('Location: ../formSaisieFrais.html');
    }
  }
  else{
    //retourner vers la page de départ
    header('Location: ../index.html');

    //  avertir l'utilisateur
    // faire un script Js

  } 
?>