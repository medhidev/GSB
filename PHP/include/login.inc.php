<?php
  // Accès à la BDD des comptes d'utilisateur
  $host = "localhost";
  $nomBdd = "compte";
  $login = "User";
  $passwordBdd = "userpassword";

  // Connection BDD
  try {
    $connect= new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>