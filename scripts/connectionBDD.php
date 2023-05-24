<?php
  // Variables
  $id = $_POST["identifiant"];
  $password = $_POST["password"];
  $send = $_POST["send"];
  $reset = $_POST["clear"];
  $selectTypeUser = $_POST["type-utilisateur"];

  // Requêtes SQL
  $IdRequestUser = "SELECT id FROM Gsb_BDD.Visiteur"
  $IdRequestCompta = "SELECT mdp FROM Gsb_BDD.Visiteur"

  $MdpRequestUser = "SELECT id FROM Gsb_BDD.Visiteur"
  $MdpRequestCompta = "SELECT mdp FROM Gsb_BDD.Visiteur"

  // Config BDD
  $host = "localhost";
  $nomBdd = "Gsb_BDD";
  $login = "root";
  $passwordBdd = "";

  // Connection BDD
  try{
    $connect = new PDO("mysql:host=$host;dbname=$nomBdd;$login;$passwordBdd);
  } catch(Exception $e){
    die ("Connection Impossible avec '$host'"$e->getMessage());
  } 

  //Redirection de page en fonction du compte

  //utilisateur
  if($id == $connection->exec() && $password == "userpassword"){
    
  }
  else if($id == "comptaid" && $password == "comptapassword"){
    
  }
  else{
    echo "les valeurs entrée en saisie ne sont pas valide";
  }
  
?>