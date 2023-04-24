<!DOCTYPE html>
<html>

<?php
  session_start();
  //Donner un une session à l'utilisateur
  $_SESSION["connect"] = "session1";

  //test
  echo $_SERVER["REMOTE_ADDR"]."<br>"; //IP utilisateur
  echo date("Y-m-d H:i:s"); //Format SQL

?>

<!-- Librairies & Metadata -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Acceuil | GSB</title>
  <link href="styles/style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="images/gsb.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/7aec2fa477.js" crossorigin="anonymous"></script>
  <script src="Js/main.js"></script>
</head>

<body>
  <!-- Création d'une balise "form" -->
  <form action="PHP/verifConnect.php" method="post" onsubmit="emptyField()">
    <h2>Connexion à votre compte</h2>
    <p>Login</p>
    <input type="text" name="identifiant" id="login">
    <p>Mot de passe</p>
    <!-- Input type "password" pour protéger la vue du mot de passe -->
    <input type="password" name="password" id="password">
    <label>
      <div class="password-icon">
        <i data-feather="eye"></i>
        <i data-feather="eye-off"></i> 
        <span id="eye" onclick="togglePasswordVisibility()">
          <i class="fa fa-eye-slash"></i>
        </span>
      </div>
    </label>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
    </script>
    <br>

    <!-- Création d'un compte -->
    <!-- <a href="creationCompte.html" style="text-decoration: none; font-size: 12px;">creer un compte</a> -->

    <div class="boutons">
      <input type="submit" name="send">
      <input type="reset" name="clear">
    </div>
  </form>
</body>

<footer>
  <div style="position: absolute; bottom: 0; left: 0; right: 1; padding: 10px">
    Site GSB - BTS SIO 1 &copy; 2022 / 2023
  </div>
  <div>
    <!-- Mettre les informations de respect des normes XML ... -->
  </div>
</footer>
</html>