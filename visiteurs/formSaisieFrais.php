<html>
<?php
session_start();
?>

<head>
  <link href="styles/formsaisieFrais.css" >
  <title>Gestion des frais de visite</title>
  <script language="javascript">
    function ajoutLigne(pNumero) {
      //ajoute une ligne de produits/qte a la div "lignes"     
      //masque le bouton en cours
      document.getElementById("but" + pNumero).setAttribute("hidden", "true");
      pNumero++;										//incremente le numero de ligne
      var laDiv = document.getElementById("lignes");	//recupere l'objet DOM qui contient les donnees
      var titre = document.createElement("label");	//cree un label
      laDiv.appendChild(titre);						//l'ajoute a la DIV
      titre.setAttribute("class", "titre");			//definit les proprietes
      titre.innerHTML = "   " + pNumero + " : ";

      //zone our la date du frais
      var ladate = document.createElement("input");
      laDiv.appendChild(ladate);
      ladate.setAttribute("name", "FRA_AUT_DAT" + pNumero);
      ladate.setAttribute("size", "12");
      ladate.setAttribute("class", "zone");
      ladate.setAttribute("type", "text");

      //zone de saisie pour un nouveau libelle			
      var libelle = document.createElement("input");
      laDiv.appendChild(libelle);
      libelle.setAttribute("name", "FRA_AUT_LIB" + pNumero);
      libelle.setAttribute("size", "30");
      libelle.setAttribute("class", "zone");
      libelle.setAttribute("type", "text");

      //zone de saisie pour un nouveau montant		
      var mont = document.createElement("input");
      laDiv.appendChild(mont);
      mont.setAttribute("name", "FRA_AUT_MONT" + pNumero);
      mont.setAttribute("size", "3");
      mont.setAttribute("class", "zone");
      mont.setAttribute("type", "text");
      var bouton = document.createElement("input");
      laDiv.appendChild(bouton);
      
      //ajoute une gestion evenementielle en faisant evoluer le numero de la ligne
      bouton.setAttribute("onClick", "ajoutLigne(" + pNumero + ");");
      bouton.setAttribute("type", "button");
      bouton.setAttribute("value", "+");
      bouton.setAttribute("class", "zone");
      bouton.setAttribute("id", "but" + pNumero);
    }
  </script>
  <style>
    body{
      font-family: Arial;
    }
  </style>
</head>
<header>
  <h1>Gestion des Frais</h1>
  <link href="styles/formsaisieFrais.css" rel="stylesheet" type="text/css" />
</header>

<body>
  <div name="gauche" style="clear:left;float:left;width:18%; background-color:white; height:100%;">
    <div name="coin" style="height:10%;margin-top: 50px;">
      <a href="../index.php"><img src="../images/gsb.png" width="100" height="60"></a>
    </div>
    <div name="menu">
      <h2>Outils</h2>
      <ul>
        <li>Frais</li>
        <ul>
          <li><a href="formSaisieFrais.php">Nouveau</a></li>
          <li><a href="formConsultFrais.php">Consulter</a></li>
        </ul>
      </ul>
    </div>
  </div>
  <div name="droite" style="float:left;width:80%;">
    <div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">

      <form name="formSaisieFrais" method="post" action="enregSaisieFrais.php" style="margin-top: 50px;">
        <h1> Saisie </h1>
        <table>
          <tr>
            <td>
              <label class="titre">
                Periode d'Engagement
              </label>
            </td>
            <td>
              <input type="text" size="4" name="FRA_PER" class="zone" />
            </td>
          </tr>
          <tr>
            <td>
              <label style="float:left;">
                Mois (2 chiffres) :
              </label>
            </td>
            <td>
              <input type="text" size="4" name="FRA_MOIS" class="zone" />
            </td>
          </tr>
          <tr>
            <td>
              <label style="float:left;">
                Annee (4 chiffres) :
              </label>
            </td>
            <td>
              <input type="text" size="4" name="FRA_AN" class="zone" />
            </td>
          </tr>
        </table>

        <p class="titre">
        <div style="clear:left;">
          <h2>Frais au forfait</h2>
        </div>
        <table>
          <tr>
            <td>
              <label class="titre">
                Repas midi :
              </label>
            </td>
            <td>
              <input type="text" size="2" name="FRA_REPAS" class="zone" values/>
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Nuitees :
              </label>
            </td>
            <td>
              <input type="text" size="2" name="FRA_NUIT" class="zone" />
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Etape :
              </label>
            </td>
            <td>
              <input type="text" size="5" name="FRA_ETAP" class="zone" />
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Km :
              </label>
            </td>
            <td>
              <input type="text" size="5" name="FRA_KM" class="zone" />
            </td>
          </tr>
        </table>

        <p class="titre">
        <div style="clear:left;">
          <h2>Hors Forfait</h2>
        </div>

        <div style="clear:left;">
          <div style="margin-left:180;float:left;width:90;text-align:center;">
            Date
          </div>
          <div style="float:left;width:220;text-align:center;">
            Libelle
          </div>
          <div style="float:left;width:30;text-align:center;">
            Montant
          </div>
        </div>
        <div style="clear:left;" id="lignes">
          <label class="titre"> 1 : </label>
          <input type="text" size="12" name="FRA_AUT_DAT1" class="zone" />
          <input type="text" size="30" name="FRA_AUT_LIB1" class="zone" />
          <input class="zone" size="3" name="FRA_AUT_MONT1" type="text" />
          <input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone" />
        </div>
        <br>
        <p class="titre">
          <!-- <label class="titre">&nbsp;</label> -->
          <input class="zone" type="reset" />&nbsp;
          <input class="zone" type="submit" />
      </form>
    </div>
  </div>
</body>

</html>