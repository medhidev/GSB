<?php
session_start();
?>
<html>
<head>
  <link href="../styles/formsaisieFrais.css" >
  <link href="../styles/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="../images/gsb.png" type="image/x-icon">
  <title>Gestion des frais de visite</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script language="javascript">
    $(document).ready(function () {
      var counter = 0;

      $("#addrow").on("click", function () {
          var newRow = $("<tr>");
          var cols = "";

          cols += '<td><input type="text" class="form-control" name="date' + counter + '" value="<?php echo $_SESSION["date"] ?>" disabled/></td>';
          cols += '<td><input type="text" class="form-control" name="libelle' + counter + '"/></td>';
          cols += '<td><input type="text" class="form-control" name="montant' + counter + '"/></td>';

          cols += '<td><input type="button" class="ibtnDel btn btn-md btn-warning "  value="Supprimer"></td>';
          newRow.append(cols);
          $("table.table-bordered").append(newRow);
          counter++;
      });



      $("table.table-bordered").on("click", ".ibtnDel", function (event) {
          $(this).closest("tr").remove();
          counter -= 1
      });
    });
  </script>
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
          <a href="javascript:location.reload();" class="nav-link active" aria-current="page">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Saisie des frais
          </a>
        </li>
        <li>
          <a href="formConsultFrais.php" class="nav-link text-white">
            <i class="fas fa-search"></i>
            Consultation des frais
          </a>
        </li>
      </ul>
    </div>

    <div class="mw-100 w-75 p-3 text-bg-primary">
      <form class="needs-validation mt-5" name="formSaisieFrais" method="post" action="../PHP/visiteurs/envoieSaisieVisiteur.php">
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="FRA_MOIS" class="form-label">Mois</label>
            <input type="text" class="form-control" id="FRA_MOIS" placeholder="MM" value="<?php echo $_SESSION["mois"] ?>" disabled>
          </div>

          <div class="col-sm-6">
            <label for="FRA_AN" class="form-label">Année</label>
            <input type="text" class="form-control" id="FRA_AN" placeholder="AAAA" value="<?php echo $_SESSION["annee"] ?>" disabled>
          </div>
        </div>
        <hr class="my-4">

        <h4 class="mb-3">Frais inclus dans le forfait</h4>
        <div class="row g-3">
          <div class="col-md-3">
            <label for="FRA_REPAS" class="form-label">Repas</label>
            <input type="text" class="form-control" id="FRA_REPAS" name="FRA_REPAS" required>
          </div>

          <div class="col-md-3">
            <label for="FRA_NUIT" class="form-label">Nuitées</label>
            <input type="text" class="form-control" id="FRA_NUIT" name="FRA_NUIT" required>
          </div>

          <div class="col-md-3">
            <label for="FRA_ETAP" class="form-label">Etapes</label>
            <input type="text" class="form-control" id="FRA_ETAP" name="FRA_ETAP" required>
          </div>

          <div class="col-md-3">
            <label for="FRA_KM" class="form-label">Distance (km)</label>
            <input type="text" class="form-control" id="FRA_KM" name="FRA_KM" required>
          </div>
        </div>
        <hr class="my-4">

        <h4 class="mb-3">Frais hors forfait</h4>

        <table class="table table-bordered" id="FRA_HORS">
          <thead class="table-primary">
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Libellé</th>
              <th scope="col">Montant</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col-sm-2">
                <input type="text" name="date" class="form-control" value="<?php echo $_SESSION["date"] ?>" disabled/>
              </td>
              <td class="col-sm-4">
                <input type="text" name="libelle" class="form-control" />
              </td>
              <td class="col-sm-2">
                <input type="text" name="montant" class="form-control" />
              </td>
              <td class="col-sm-1">
                <a class="deleteRow"></a>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <input type="button" class="btn btn-secondary btn-lg btn-block w-100" id="addrow" value="Add Row" />
                </td>
            </tr>
            <tr>
            </tr>
        </tfoot>
        </table>

        <div class="d-flex justify-content-center mb-4 fixed-bottom">
          <input class="btn btn-danger me-3 w-25" type="reset" />
          <input class="btn btn-success me-3 w-75" type="submit" />
        </div>
      </form>
    </div>
</main>


</body>

</html>