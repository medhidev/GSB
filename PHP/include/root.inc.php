<?php
  //Compte Accès à la BDD des informations utilisateur
  $host = "localhost";
  $login = "root";
  $passwordBdd = "";

  // Connection BDD
  try {
    $connect = new PDO("mysql:host=$host;dbname=infos",$login,$passwordBdd);
    $connect = new PDO("mysql:host=$host;dbname=saisies",$login,$passwordBdd);
    $connect = new PDO("mysql:host=$host;dbname=compte",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>