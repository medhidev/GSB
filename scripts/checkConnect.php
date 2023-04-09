<?php
  //import script de connexion BDD
  include("\includes\connexion.php");

  // Variables
  $login = $_POST["identifiant"];
  $password = $_POST["password"];

  // Requêtes SQL
  $request = "SELECT mdp FROM visiteur WHERE login ='$login'";
  $resultRequest = $connect->query($request);

  //verification pour chaque ligne de la BDD 
  $ligne = $resultRequest->fetch();
  
  // Si l'utilisateur se trouve bien dans la BDD
  if($ligne != false){
    echo $login.'<br>'.$password;

    // Si l'utilsateur est un compte 'compta'
    if($ligne['compta'] == 'OUI'){
      //redirection vers la page compta
    }
    else{
      //redirection vers la page user
    }
  }
  else{
    //retourner vers la page de départ
  }

  // if($_POST["typeUtilisateur"] == "visiteur"){
  //   if($connect->query($request)){
  //     //se connecter à la page
  //     echo "<strong style='color: green'>"."Connexion en tant que '$login'"."</strong>"."<br>";
  //     echo "<strong style='color: green'>"."Mot de passe '$password'"."</strong>";
  //   }
  //   else{
  //     //page d'erreur
  //     echo "<strong style='color: red'>"."Connexion en tant que comptable echoué de l'utilisateur '$id'"."</strong>"."<br>";
  //     echo "<strong style='color: red'>"."Avec le mot de passe '$password'"."</strong>";
  //   }
  // }

  // // Comptable
  // else if($_POST["typeUtilisateur"] == "comptable"){
  //   if($connect->query($request)){
  //     //se connecter à la page
  //     echo "<I style='color: green'>"."Connexion en tant que comptable réussi de l'utilisateur '$id'"."</I>"."<br>";
  //     echo "<I style='color: green'>"."Avec le mot de passe '$password'"."</I>";
  //   }
  //   else{
  //     //page d'erreur
  //     echo "<I style='color: red'>"."Connexion en tant que visiteur echoué de l'utilisateur '$id'"."</I>"."<br>";
  //     echo "<I style='color: red'>"."Avec le mot de passe '$password'"."</I>";
  //   }
  // }

  
?>