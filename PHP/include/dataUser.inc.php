<?php
  if ($_SESSION["connect"] == "sessionLogin")
  {
    $loginStocke = $login;
    $mdpStocke = $password;
  }

  echo $loginStocke;
  echo $mdpStocke;

?>