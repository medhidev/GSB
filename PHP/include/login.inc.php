<?php
  //Compte Administrateur
  $host = "localhost";
  $nomBdd = "gsb";
  $login = "UserGSB";
  $passwordBdd = "gsbpassword";

  // Connection BDD
  try {
    $connect = new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>