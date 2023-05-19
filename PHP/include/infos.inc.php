<?php
  //Compte Accès à la BDD des informations utilisateur
  $host = "localhost";
  $nomBdd = "infos";
  $login = "User";
  $passwordBdd = "userpassword";

  // Connection BDD
  try {
    $connectInfo = new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>