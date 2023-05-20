<?php
  session_start();
?>
<html>
<head>
	<link rel="shortcut icon" href="../images/gsb.png" type="image/x-icon">
	<title>Validation Frais | Comptable</title>     
	<style type="text/css">
		body {
			background-color: white;
			color:EE8855;
			font-family: Arial;
		} 
			
		.titre {
			width : 180 ; 
			clear:left;
			float:left;
		} 

		.zone {
			float : left;
			color:CC8855
		}
	</style>
</head>
<body>
<div name="gauche" style="clear:left:;float:left;width:18%; background-color:white; height:100%;">
	<div name="coin" style="height:10%;text-align:center;">
		<a href="../index.html">
			<img src="../images/gsb.png" width="100" height="60"/>
		</a>
	</div>
	<div name="menu" >
		<h2>Outils</h2>
		<ul>
			<li>Frais</li>
			<ul>
				<li><a href="../download/frais.txt" download="frais_visiteur.txt" >Enregistrer operation</a></li>
			</ul>
		</ul>
	</div>
</div>
<div name="droite" style="float:left; width:80%;">
	<div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;">
		<h1>Validation des Frais par visiteur</h1>
	</div>	
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:EE8844;color:white;height:88%;">

	<!-- Recherche les informations en fonction du mois -->
	<form action="../PHP/comptables/rechercheFrais.php" method="post">
		<p>
			<br><br>
			<label class="titre" style="text-align: center;">Mois :</label>
			<input class="zone" type="text" name="dateValid" size="13" required>
			<input type="submit" value="rechercher">
		</p>
		<label class="titre">Choisir le visiteur :</label>
		<select name="lstVisiteur" class="zone">
			<?php
				require("../PHP/include/login.inc.php");

				//requetes des nom des visiteurs
				$reqSQL = "SELECT nom, id FROM compte.visiteur";
				$result=$connect->query($reqSQL);
				$ligne = $result->fetch();

				// Boucle sur tous le jeu d'enregistrement
				while ($ligne != false)
				{
					// On stocke les données de la classe dans des variables
					$num = $ligne["id"]; // numéro ID
					$nomVisiteur = $ligne["nom"]; // Nom visteur
					echo "<option value='$num'>$nomVisiteur</option>";

					// Lecture de la ligne suivante dans le jeu d'enregistrements
					$ligne = $result->fetch();
				}
			?>
		</select>
	</form>

	<!-- Affichage des informations -->
	<form name="formValidFrais" method="post" action="../PHP/comptables/envoieSaisieComptable.php">
		<p class="titre"></p>
		<div style="clear:left;">
			<h2>Frais au forfait </h2>
		</div>
		<table style="color:white;">
			<tr>
				<td>Repas midi</td>
				<th>Nuitee </th>
				<th>Etape</th>
				<th>Km </th>
				<th>Situation</th>
			</tr>
			<tr align="center">
				<td width="80" ><input type="text" size="3" name="repas" value="<?php echo $_SESSION["quantiteREP"];?>"/></td>
				<td width="80"><input  type="text" size="3" name="nuitee" value="<?php echo $_SESSION["quantiteNUI"];?>"/></td> 
				<td width="80"> <input type="text" size="3" name="etape" value="<?php echo $_SESSION["quantiteETP"];?>"/></td>
				<td width="80"> <input type="text" size="3" name="km" value="<?php echo $_SESSION["quantiteKM"];?>"/></td>
				<td width="80"> 
					<select size="3" name="situ">
						<option value="E">Enregistre</option>
						<option value="V">Valide</option>
						<option value="R">Rembourse</option>
					</select>
				</td>
			</tr>
		</table>
		
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
		<table style="color:white;">
			<tr><th>Date</th><th>Libelle </th><th>Montant</th><th>Situation</th></tr>
			<tr align="center"><td width="100" ><input type="text" size="12" name="hfDate1"/></td>
				<td width="220"><input type="text" size="30" name="hfLib1"/></td> 
				<td width="90"> <input type="text" size="10" name="hfMont1"/></td>
				<td width="80"> 
					<select size="3" name="hfSitu1">
						<option value="E">Enregistre</option>
						<option value="V">Valide</option>
						<option value="R">Rembourse</option>
					</select></td>
				</tr>
		</table>		
		<p class="titre"></p>
		<div class="titre">Nb Justificatifs</div>
		<input type="text" class="zone" size="4" name="hcMontant"/>		
		<p class="titre" /><label class="titre">&nbsp;</label>

		<!-- Envoie formulaire -->
		<input class="zone"type="reset" />
		<input class="zone"type="submit" />
	</form>
	</div>
</div>
</body>
</html>