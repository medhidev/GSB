<?php
session_start();
?>
<html>
<head>
  <!-- <link href="test.css"> -->
  <link rel="shortcut icon" href="../images/gsb.png" type="image/x-icon">
  <title>Consult frais</title>
  <style type="text/css">
    body {
      background-color: #6A9DEC;
      color:white;
      font-family: arial;
    } 
    .titre {
      width: 180;
      clear: left;
      float: left;
    }

    .zone {
      float: left;
      color: white;
    }

    .bloc{
      padding: 10px;
      border-radius: 10px;
    }

  </style>
</head>

<body>
  <div name="gauche" style="clear:left;float:left;width:18%; height:100%;">
    <div name="coin" style="height:10%;text-align:center;">
      <a href="../PHP/accueil/deconnection.php"><img src="../images/gsb.png" width="100" height="60" /></a>
    </div>
    <div name="menu">
      <h2>Outils</h2>
      <ul>
        <li>Frais</li>
        <ul>
          <li>
            <a href="formSaisieFrais.php">Nouveau</a>
          </li>
          <li>
            <a href="formConsultFrais.php">Consulter</a>
          </li>
        </ul>
      </ul>
    </div>
  </div>
  <div name="droite" style="float:left;width:80%;">
    <div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;">
      <h1>Suivi de remboursement des Frais</h1>
    </div>
    <div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">

    <!-- PERIODE  -->
    <div class="bloc">
      <form name="formConsultFrais" method="post" action="../PHP/visiteurs/afficheSaisieVisiteur.php">
        <h1> Periode </h1>
        <label class="titre" style="color: black; font-weight: bold; text-align:center;">Mois/Annee :</label> <input class="zone" type="text" name="dateConsult" size="5" />&nbsp;
        <input type="submit" value="rechercher">
      </form>

        <p class="titre">
        <div style="clear:left;">
          <h2>Frais au forfait </h2>
        </div>
        <table style="color:black; border:1">
          <tr>
            <th>Repas midi</th>
            <th>Nuitee </th>
            <th>Etape</th>
            <th>Km </th>
            <th>Situation</th>
            <th>Date operation</th>
            <th>Remboursement</th>
          </tr>
          <tr text-align="center">
            <td width="80"></td>
            <td width="80"><label size="3" name="nuitee"></td>
            <td width="80"> <label size="3" name="etape"></td>
            <td width="80"> <label size="3" name="km"></td>
            <td width="80"> <label size="3" name="situation"></td>
            <td width="80"> <label size="3" name="dateOper"></td>
            <td width="80"> <label size="3" name="dateOper"></td>
          </tr>
        </table>

        <p class="titre">
        <div style="clear:left;">
          <h2>Hors Forfait</h2>
        </div>
        <table style="color:black; border:1">
          <tr>
            <th>Date</th>
            <th>Libelle </th>
            <th>Montant</th>
            <th>Situation</th>
            <th>Date operation</th>
          </tr>
          <tr text-align="center">
            <td width="100"><label size="12" name="hfDate1"></td>
            <td width="220"><label size="30" name="hfLib1"></td>
            <td width="90"><label size="10" name="hfMont1"></td>
            <td width="80"> <label size="3" name="hfSitu1"></td>
            <td width="80"> <label size="3" name="hfDateOper1"></td>
          </tr>
        </table>
    </div>
  </div>
</body>

</html>