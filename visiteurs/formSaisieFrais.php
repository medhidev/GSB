<html>
<?php
  session_start();

  // Requêtes SQL
  require_once("../PHP/include/infos.inc.php");
  $reqRepas = "SELECT montant FROM infos.fraisforfait WHERE id='REP'";
  $reqNuit = "SELECT montant FROM infos.fraisforfait WHERE id='NUI'";
  $reqEtape = "SELECT montant FROM infos.fraisforfait WHERE id='ETP'";
  $reqKm = "SELECT montant FROM infos.fraisforfait WHERE id='KM'";

  // Données Repas
  $verifRepas = $connectInfo->query($reqRepas);
  $ligneRepas = $verifRepas->fetch();
  $_SESSION["prixRepas"] = $ligneRepas["montant"];

  // Données Nuit
  $verifNuit = $connectInfo->query($reqNuit);
  $ligneNuit = $verifNuit->fetch();
  $_SESSION["prixNuit"] = $ligneNuit["montant"];

  // Données Etape
  $verifEtape= $connectInfo->query($reqEtape);
  $ligneEtape = $verifEtape->fetch();
  $_SESSION["prixEtape"] = $ligneEtape["montant"];

  // Données Km
  $verifKm = $connectInfo->query($reqKm);
  $ligneKm = $verifKm->fetch();
  $_SESSION["prixKm"] = $ligneKm["montant"];
?>

<head>
  <!-- <link rel="stylesheet" href="../styles/formsaisieFrais.css"> -->
  <link rel="shortcut icon" href="../images/gsb.png" type="image/x-icon">
  <link rel="stylesheet" href="../styles/formsaisieFrais.css">
  <script src="../Js/emptyfield.js"></script>
  <title>Gestion des frais de visite</title>
</head>

<body style="font-family: Arial;">
  <!-- GAUCHE-->
  <div name="gauche" style="clear:left;float:left;width:18%; background-color:white; height:100%;">
    <div name="coin" style="height:10%;margin-top: 50px;">
      <a href="../PHP/accueil/deconnection.php"><img src="../images/gsb.png" width="100" height="60"></a>
    </div>
    <div name="menu">
      <h2>Outils</h2>
      <ul>
        <li>Frais</li>
        <ul>
          <li><a href="formSaisieFrais.php">Nouveau</a></li>
          <li><a href="formConsultFrais.php">Consulter</a></li>
        </ul><br><br>
        <li id="bottom">Connecté en tant que: <br><?php echo $_SESSION["Login"]; ?></li>
      </ul>
    </div>
  </div>

  <!-- DROITE -->
  <div name="droite" style="float:left;width:80%;">
    <div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">

      <form name="formSaisieFrais" method="post" action="../PHP/visiteurs/envoieSaisieVisiteur.php" style="margin-top: 50px;" onsubmit="emptyField()">
        <h1>Saisie | Gestion des Frais</h1><br>
        <h2>Periode Engagement</h2>
        <table>
          <tr>
            <td>
              <label style="float:left;">
                Mois (2 chiffres) :
              </label>
            </td>
            <td>
              <input type="text" size="4" name="FRA_MOIS" class="zone" disabled="disabled" value="<?php echo (string)date('m');?>"/>
            </td>
          </tr>
          <tr>
            <td>
              <label style="float:left;">
                Annee (4 chiffres) :
              </label>
            </td>
            <td>
              <input type="text" size="4" name="FRA_AN" class="zone" disabled="disabled" value="<?php echo (string)date('Y');?>"/>
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
              <input type="number" name="FRA_REPAS" class="zone" id="FRA_REPAS" style="width: 30%;"/>
              <?php echo "(".$_SESSION["prixRepas"].") unit";?>
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Nuitees :
              </label>
            </td>
            <td>
              <input type="number" name="FRA_NUIT" class="zone" id="FRA_NUIT" style="width: 30%;"/>
              <?php echo "(".$_SESSION["prixNuit"].") unit";?>
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Etape :
              </label>
            </td>
            <td>
              <input type="number" name="FRA_ETAP" class="zone" id="FRA_ETAP" style="width: 30%;"/>
              <?php echo "(".$_SESSION["prixEtape"].") unit";?>
            </td>
          </tr>
          <tr>
            <td>
              <label class="titre">
                Km :
              </label>
            </td>
            <td>
              <input type="number" name="FRA_KM" class="zone" id="FRA_KM" style="width: 30%;" />
              <?php echo "(".$_SESSION["prixKm"].") unit";?>
            </td>
          </tr>
          <tr>
            <td>
            <br><br>
              Montant:
            </td>
            <td>
              <br><br>
              <input class="zone" style="width: 30%;" name="FRA_AUT_MONT" type="text" id="montant" disabled="disabled"/>
            </td>
          </tr>
        </table>

        <p class="titre">
        <div style="clear:left;">
          <h2>Hors Forfait</h2>
        <div style="clear:left;" id="lignes">
          <label class="titre"> 1 : </label>
          <input type="text" size="12" name="FRA_AUT_DAT1" class="zone" placeholder="Date" disabled="disabled" value="<?php echo (string)date('d.m.Y');?>"/>

          <input type="text" size="30" name="FRA_AUT_LIB1" id="FRA_AUT_LIB1" class="zone" placeholder="Libelle"/>
          <input type="text" size="5" name="prix" id="prix" class="zone" placeholder="Prix" style="text-align: center;"/>

          <input class="zone" size="10" name="FRA_AUT_MONT1" id="FRA_AUT_MONT1" type="text" id="montant" disabled="disbaled" placeholder="Ajout"/>
          <input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone" />
        </div>
        <br>
        <p class="titre">
          <input class="zone" type="submit" />&nbsp;
          <input class="zone" type="reset" />
      </form>
    </div>
  </div>
</body>
<script language="javascript">
  function ajoutLigne(pNumero)
  {
    //ajoute une ligne de produits/qte a la div "lignes"     
    //masque le bouton en cours
    document.getElementById("but" + pNumero).setAttribute("hidden", "true");
    pNumero++;										//incremente le numero de ligne
    var laDiv = document.getElementById("lignes");	//recupere l'objet DOM qui contient les donnees
    var titre = document.createElement("label");	//cree un label
    laDiv.appendChild(titre);						//l'ajoute a la DIV
    titre.setAttribute("class", "titre");			//definit les proprietes
    titre.innerHTML = "<br>" + pNumero + " : ";

    //zone our la date du frais
    var ladate = document.createElement("input");
    laDiv.appendChild(ladate);
    ladate.setAttribute("name", "FRA_AUT_DAT" + pNumero);
    ladate.setAttribute("size", "12");
    ladate.setAttribute("class", "zone");
    ladate.setAttribute("type", "text");
    ladate.setAttribute("placeholder", "Date");
    ladate.setAttribute("disabled", "disabled");
    ladate.setAttribute("value", "<?php echo (string)date('d.m.Y');?>");

    //zone de saisie pour un nouveau libelle			
    var libelle = document.createElement("input");
    laDiv.appendChild(libelle);
    libelle.setAttribute("name", "FRA_AUT_LIB" + pNumero);
    libelle.setAttribute("size", "30");
    libelle.setAttribute("class", "zone");
    libelle.setAttribute("type", "text");
    libelle.setAttribute("placeholder", "Libelle");

    //zone de saisie pour le prix	
    var prix = document.createElement("input");
    laDiv.appendChild(prix);
    prix.setAttribute("name", "prix" + pNumero);
    prix.setAttribute("size", "5");
    prix.setAttribute("class", "zone");
    prix.setAttribute("type", "text");
    prix.setAttribute("placeholder", "Prix");
    prix.setAttribute("style", "text-align: center");

    //Affichage montant		
    var mont = document.createElement("input");
    laDiv.appendChild(mont);
    mont.setAttribute("name", "FRA_AUT_MONT" + pNumero);
    mont.setAttribute("size", "10");
    mont.setAttribute("class", "zone");
    mont.setAttribute("type", "text");
    mont.setAttribute("placeholder", "Ajout");
    mont.setAttribute("disabled", "disabled");
    mont.setAttribute("id", "montant");
    var bouton = document.createElement("input");
    laDiv.appendChild(bouton);
      
    //ajoute une gestion evenementielle en faisant evoluer le numero de la ligne
    bouton.setAttribute("onClick", "ajoutLigne(" + pNumero + ");");
    bouton.setAttribute("type", "button");
    bouton.setAttribute("value", "+");
    bouton.setAttribute("class", "zone");
    bouton.setAttribute("id", "but" + pNumero);
  }

  // Frais forfait
  var repas = document.querySelector("#FRA_REPAS");
  var nuit = document.querySelector("#FRA_NUIT");
  var etape = document.querySelector("#FRA_ETAP");
  var km = document.querySelector("#FRA_KM");
  var montant = document.querySelector("#montant");

  // Frais hors-forfait
  var libelle = document.querySelector("#FRA_AUT_LIB1");
  var prix = document.querySelector("#prix");
  var montantComplementaire = document.querySelector("#FRA_AUT_MONT1");

  // Ajout des écouteurs d'événements pour chaque champ d'entrée
  repas.addEventListener("input", calculFrais);
  nuit.addEventListener("input", calculFrais);
  etape.addEventListener("input", calculFrais);
  km.addEventListener("input", calculFrais);

  //Activer l'event lorsque Prix & libelle sont complété
  prix.addEventListener("input", AjoutPrix);
  libelle.addEventListener("input", AjoutPrix);

  // Fonction de calcul des frais
  function calculFrais()
  {
    // Vérification si tous les champs sont remplis
    if (Boolean(repas.value) && Boolean(nuit.value) && Boolean(etape.value) && Boolean(km.value))
    {
      var result = parseInt(repas.value)* <?php echo $_SESSION["prixRepas"];?> + parseInt(nuit.value)* <?php echo $_SESSION["prixNuit"];?>
      + parseInt(etape.value)* <?php echo $_SESSION["prixEtape"];?> + parseInt(km.value)* <?php echo $_SESSION["prixKm"];?>;
      montant.value = result;
    }
    else
    {
      montant.value = 0;
    }

    return montant.value;
  }

  function AjoutPrix()
  {
    if (Boolean(libelle.value) && Boolean(prix.value))
    {
      var result = parseFloat(calculFrais()) + parseFloat(prix.value);
      montantComplementaire.value = result;
    }
    else
    {
      montantComplementaire.value = 0;
    }

    return montantComplementaire.value;
  }
</script>

</html>