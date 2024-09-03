<?php
    require_once __DIR__.'\vendor\autoload.php';
    use App\Connection\Connection;
    $pdo = Connection::getInstance()->getConnection();
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM CONFERENCE WHERE ID_CONF =' . $id;
        $select = $pdo->query($sql);
        $result = $select->fetch(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>Conference Details</title>
  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700">
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/style.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-gradient-primary text-white text-center">
                <h2 class="text-capitalize font-weight-bold mb-0"><?= htmlspecialchars($result['NOM']) ?></h2>
                <h6 class="card-subtitle mt-2"><?= htmlspecialchars($result['SIGLE']) ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Submission Date :</strong> <?= htmlspecialchars($result['DATE_SOUMISSION']) ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Start Date :</strong> <?= htmlspecialchars($result['DATE_DEROULEMENT']) ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">
                            <strong>Results Date :</strong> <?= htmlspecialchars($result['DATE_RESULTAT']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="edit_conf.php?id=<?= $id ?>" class="btn btn-outline-primary">Modifier</a>
                <a href="delete_conf.php?id=<?= $id ?>" class="btn btn-outline-danger">Supprimer</a>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
