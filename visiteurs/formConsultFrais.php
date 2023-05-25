<?php
session_start();

//Valeur par défaut Champ Vide -> éviter des message d'erreur
$_SESSION["dateSearch"] = "__.__.__";
$_SESSION["remboursement"] = "____";

$_SESSION["REP"] = "____";
$_SESSION["NUI"] = "____";
$_SESSION["ETP"] = "____";
$_SESSION["KM"] = "____";

$_SESSION["LibelleSearch"] = "____";
$_SESSION["MontantSearch"] = "____";
$_SESSION["Situation"] = "____";
$_SESSION["LibelleSearch"] = "____";

$_SESSION["Justificatif"] = "____";
?>
<html>

<head>
  <link href="../styles/formsaisieFrais.css" >
  <link href="../styles/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="../images/gsb.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suivi des frais de visite</title>
  </head>

<body>
  <main class="d-flex flex-nowrap h-100">

    <div class="d-flex flex-column w-25 flex-shrink-0 p-3 text-bg-dark">
      <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <a href="../PHP/deconnection.php"><img class="mb-4" src="../images/gsb.png" alt="" width="52" height="37"></a>
        <span class="fs-4">Gestion des Frais</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="formSaisieFrais.php" class="nav-link text-white">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Saisie des frais
          </a>
        </li>
        <li>
          <a href="javascript:location.reload();" class="nav-link active" aria-current="page">
            <i class="fas fa-search"></i>
            Consultation des frais
          </a>
        </li>
      </ul>
    </div>

    <div class="mw-100 w-75 p-3 text-bg-info">
      <form name="formConsultFrais" method="post" action="../PHP/visiteurs/envoieSasieVisiteur.php">
        <div class="row g-3">
      
        <div class="col-sm-6">
          <label for="dateConsult" class="form-label">Période</label>
          <input type="text" class="form-control" id="dateConsult" placeholder="DD.MM.AAAA">
          <input type="submit" class="form-control" id="searchConsultFrais" value="Rechercher">
        </div>
      </form>

    
        <hr class="my-4">

        <h4 class="mb-3">Frais inclus dans le forfait</h4>
        <table class="table table-bordered">
          <thead class="table-primary">
            <tr class="text-center">
              <th>Repas midi</th>
              <th>Nuitée </th>
              <th>Etape</th>
              <th>Km </th>
              <th>Situation</th>
              <th>Date opération</th>
              <th>Remboursement</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $_SESSION["REP"]; ?></td>
              <td> <?php echo $_SESSION["NUI"]; ?></td>
              <td> <?php echo $_SESSION["ETP"]; ?></td>
              <td> <?php echo $_SESSION["KM"]; ?></td>
              <td> <?php echo $_SESSION["NUI"]; ?></td>
              <td> <?php echo $_SESSION["dateSearch"]; ?></td>
              <td> <?php echo $_SESSION["remboursement"].' €'; ?></td>
            </tr>
          </tbody>
        </table>
          
        <hr class="my-4">

        <h4 class="mb-3">Frais hors forfait</h4>

        <table class="table table-bordered">
          <thead class="table-primary">
            <tr class="text-center">
              <th>Date opération</th>
              <th>Libellé </th>
              <th>Montant</th>
              <th>Situation</th>
              <!-- <th>Date opération</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $_SESSION["dateSearch"]; ?></td>
              <td> <?php echo $_SESSION["NUI"]; ?></td>
              <td> <?php echo $_SESSION["NUI"]; ?></td>
              <td> <?php echo $_SESSION["NUI"]; ?></td>
              <!-- <td> <?php echo $_SESSION["dateSearch"]; ?></td> -->
            </tr>
          </tbody>
        </table>
        
        <hr class="my-4">

        <div class="col-sm-2">
          <label for="hcMontant" class="form-label">Nb Justificatifs</label>
          <input type="text" class="form-control" id="hcMontant" value="<?php echo $_SESSION["Justificatif"];?>" readonly>
        </div>
    </div>
  </main>
</body>

</html>