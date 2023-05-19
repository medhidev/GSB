<?php
  //Compte Administrateur
  $host = "localhost";
  $nomBdd = "saisies";
  $login = "Admin";
  $passwordBdd = "adminpassword";

  // Connection BDD
  try {
    $connectSaisie = new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>