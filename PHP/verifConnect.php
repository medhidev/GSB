<?php
  //import script de connection BDD
  require("\includes\connection.php");

  // Variables des champs de saisies
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Requêtes SQL
  $request = "SELECT * FROM visiteur WHERE login ='$login' AND mdp = '$password'";
  $resultRequest = $connect->query($request);
  $ligne = $resultRequest->fetch();
  
  // Si l'utilisateur se trouve bien dans la BDD
  if($ligne != false){
    // Si l'utilsateur est un comptable
    if($ligne['compta'] == 'OUI'){
      header('Location: ../comptables/formValidFrais.php');
    }
    else{
      header('Location: ../visiteurs/formSaisieFrais.php');
    }
  }
  else{
    //retourner vers la page de départ
    header('Location: ../index.html');
  } 
?>