<?php
require_once 'config.inc.php';
require_once '_app/model/Historico.php';

var_dump(parse_url(getenv('DATABASE_URL')));
var_dump(HOST, USER, PASS, DBSA, PORT);

$Historico = new Historico;
var_dump($Historico->getHistoricos());


die();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= HOME ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="vendor/snapappointments/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- DataTables CSS -->
    <!--    <link rel="stylesheet" type="text/css" href="vendor/datatables.net/datatables.net-responsive/"/>-->
    <title>Guntzell</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Start Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Autorizador</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Ouvidoria</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">URA</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">Parcele<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="container-fluid">
        <div class="jumbotron mt-3">
            <h1>GT-CRM</h1>
            <p class="lead">Relatórios personalizados...</p>
            <a class="btn btn-lg btn-primary" href="_app/view/parcele/index.php" role="button">Parcele Cobrança</a>
        </div>
    </div>

    <?php
    echo HOME . "<br>";
    echo BASE . "<br>";
    echo $_SERVER['SERVER_NAME'] . "<br>";

    echo "<br><br><br>";

    var_dump();

    ?>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first -->
<script src="vendor/components/jquery/jquery.min.js"></script>
<!-- then Popper.js, then Bootstrap JS -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="vendor/snapappointments/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script src="_app/_cdn/js/app.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="vendor/datatables.net/datatables.net/js/jquery.dataTables.min.js"></script>
</body>
</html>