<html>

<head>
  <link href="../styles/formsaisieFrais.css" >
  <link href="../styles/bootstrap/bootstrap.min.css" rel="stylesheet">  
  <link href="../styles/formValidFrais.css" rel="stylesheet" type="text/css" />
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Validation des frais de visite</title>
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
        <li>
          <a href="javascript:location.reload();" class="nav-link active" aria-current="page">
            <i class="fas fa-check-circle"></i>
            Validation des frais
          </a>
        </li>
      </ul>
    </div>

    <div class="mw-100 w-75 p-3 text-bg-warning">
      <form name="formValidFrais" method="post" action="enregValidFrais.php">
        <div class="row g-3">
        <select class="col-sm-6 form-select w-75" aria-label="Choisir le visiteur ">
          <option selected>Choisir le visiteur </option>
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
        <div class="col-sm-6 w-25 form-floating">
          <input type="text" name="dateValid" class="form-control" id="floatingInput" placeholder="MM">
          <label for="floatingInput">Mois</label>
        </div>
</div>
    
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
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label name="repas" /></td>
              <td><label name="nuitee" /></td>
              <td> <label name="etape" /></td>
              <td> <label name="km" /></td>
              <td>
                <select class="col-sm-6 form-select" aria-label="Choisir un état" name="situ">
                  <option selected>Choisir un état </option>
                  <option value="E">Enregistré</option>
                  <option value="V">Validé</option>
                  <option value="R">Remboursé</option>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
          
        <hr class="my-4">

        <h4 class="mb-3">Frais hors forfait</h4>

        <table class="table table-bordered">
          <thead class="table-primary">
            <tr class="text-center">
              <th>Date</th>
              <th>Libellé </th>
              <th>Montant</th>
              <th>Situation</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label name="hfDate1" /></td>
              <td><label name="hfLib1" /></td>
              <td><label name="hfMont1" /></td>
              <td>
                <select class="col-sm-6 form-select" aria-label="Choisir un état" name="hfSitu1">
                  <option selected>Choisir un état </option>
                  <option value="E">Enregistré</option>
                  <option value="V">Validé</option>
                  <option value="R">Remboursé</option>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        
        <hr class="my-4">

        <div class="col-sm-2">
          <label for="hcMontant" class="form-label">Nb Justificatifs</label>
          <input type="text" class="form-control" id="hcMontant" value="" >
        </div>

        <div class="d-flex justify-content-center mb-4 fixed-bottom">
          <input class="btn btn-danger me-3 w-25" type="reset" />
          <input class="btn btn-success me-3 w-75" type="submit" />
        </div>
      </form>
    </div>
  </main>
</body>
</html>