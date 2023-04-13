<?php
    // Config BDD
  $host = "localhost";
  $nomBdd = "gsb";
  $login = "root";
  $passwordBdd = "";

  // Connection BDD
  try {
    $connect = new PDO("mysql:host=$host;dbname=$nomBdd",$login,$passwordBdd);
  }
  catch(Exception $e){
    die ("Connection Impossible avec '$host'".$e->getMessage());
  } 
?>