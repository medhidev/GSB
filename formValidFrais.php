<html>

<head>
  <link href="">
  <title>Validation des frais de visite</title>
  <style type="text/css">
    body {
      background-color: white;
      color:EE8855;
      font-family: Arial;
    }

    .titre {
      width: 180;
      clear: left;
      float: left;
    }

    .zone {
      float: left;
      color: CC8855
    }
  </style>
</head>

<body>
  <div name="gauche" style="clear:left;float:left;width:18%; background-color:white; height:100%;">
    <div name="coin" style="height:10%;text-align:center;">
      <a href="index.html"><img src="images/logo.jpg" width="100" height="60"></a>
    </div>
    <div name="menu">
      <h2>Outils</h2>
      <ul>
        <li>Frais</li>
        <ul>
          <li><a href="formValidFrais.htm">Enregistrer l'operation</a></li>
        </ul>
      </ul>
    </div>
  </div>
  <div name="droite" style="float:left;width:80%;">
    <div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;">
      <h1>Validation des Frais</h1>
    </div>
    <div name="bas" style="margin : 10 2 2 2;clear:left;background-color:EE8844;color:white;height:88%;">
      <form name="formValidFrais" method="post" action="enregValidFrais.php">
        <h1> Validation des frais par visiteur </h1>
        <label class="titre">Choisir le visiteur :</label>
        <select name="lstVisiteur" class="zone">
          <option value="a131">Villechalane</option>
        </select>
        <label class="titre">Mois :</label> <input class="zone" type="text" name="dateValid" size="12" />
        <p class="titre">
        <div style="clear:left;">
          <h2>Frais au forfait </h2>
        </div>
        <table style="color:white; border: 1;">
          <tr>
            <th>Repas midi</th>
            <th>Nuit </th>
            <th>Etape</th>
            <th>Km </th>
            <th>Situation</th>
          </tr>
          <tr text-align="center">
            <td width="80"><input type="text" size="3" name="repas" /></td>
            <td width="80"><input type="text" size="3" name="nuitee" /></td>
            <td width="80"> <input type="text" size="3" name="etape" /></td>
            <td width="80"> <input type="text" size="3" name="km" /></td>
            <td width="80">
              <select size="3" name="situ">
                <option value="E">Enregistre</option>
                <option value="V">Valide</option>
                <option value="R">Rembourse</option>
              </select>
            </td>
          </tr>
        </table>

        <p class="titre">
        <div style="clear:left;">
          <h2>Hors Forfait</h2>
        </div>
        <table style="color:white; border:1">
          <tr>
            <th>Date</th>
            <th>Libelle </th>
            <th>Montant</th>
            <th>Situation</th>
          </tr>
          <tr text-align="center">

              <td width="100"><input type="text" size="12" name="hfDate1"></td>
              <td width="220"><input type="text" size="30" name="hfLib1"></td>
              <td width="90"> <input type="text" size="10" name="hfMont1"></td>
              <td width="80">

              <select size="3" name="hfSitu1">
                <option value="E">Enregistre</option>
                <option value="V">Valide</option>
                <option value="R">Rembourse</option>
              </select>
            </td>
          </tr>
        </table>
        <p class="titre"></p>
        <div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant" />
        <p class="titre"><label class="titre">&nbsp;</label><input class="zone" type="reset" /><input class="zone"
          type="submit" />
      </form>
    </div>
  </div>
</body>

</html>