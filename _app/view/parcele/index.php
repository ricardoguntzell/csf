<?php
require_once '_app/database/mysqli.php';

$relatorioParcele = readParcele();
//var_dump($relatorioParcele);
//die();
//$historico = readHistorico();
//$resposta = readResposta();
//
////var_dump($historico);
////var_dump($resposta);
//$relatorioParcele = [];
//
//foreach ($historico as $valHist) {
//    foreach ($resposta as $valResp) {
//        if ($valHist["id_contaori"] == $valResp["id_contaori"] && $valHist["data_hora"] == $valResp["data_hora"]) {
//            $valHist['resposta'] = $valResp['DS_RSPTASERV'];
//            $valHist['resposta_data'] = $valResp['data_hora'];
//            $relatorioParcele[$valHist["id_contaori"]][] = $valHist;
//        }
//    }
//}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_components/bootstrap/css/bootstrap.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="_components/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="_components/datatables/datatables.min.css"/>
    <title>Guntzell</title>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Top navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">


    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Horizontal Form -->
            <div>
                <h3 class="box-title">Parcele</h3>
            </div>
            <!-- form start -->
            <div class="box-body">
                <table id="socio" class="table table-dark table-condensed">
                    <thead>
                    <tr class="">
                        <th class="text-center" style="vertical-align: middle">Conta Origem</th>
                        <th class="text-center" style="vertical-align: middle">CPF</th>
                        <th class="text-center" style="vertical-align: middle">Empresa</th>
                        <th class="text-center" style="vertical-align: middle">Data</th>
                        <th class="text-center" style="vertical-align: middle">Status</th>
                        <th class="text-center" style="vertical-align: middle">Resposta</th>
                        <!--                        <th class="text-center" style="vertical-align: middle">Ação</th>-->
                    </tr>
                    </thead>

                    <tbody>
                    <?php if ($relatorioParcele): ?>
                        <?php foreach ($relatorioParcele as $conta): ?>

                            <tr>
                                <td class="text-center" style="vertical-align: middle">
                                    <?= $conta["id_contaori"]; ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle">
                                    <?= $conta["nu_cpf"]; ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle">
                                    <?= ($conta["cd_emprs"] == "1" ? "CSF" : "ATC"); ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle">
                                    <?= $conta["data_hora"]; ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle">
                                    <?= $conta["status"] ?>
                                </td>

                                <td class="text-center" style="vertical-align: middle">
                                    <?= $conta["resposta"] ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first -->
<script src="_components/jquery/jquery-3.4.1.min.js"></script>
<!-- then Popper.js, then Bootstrap JS -->
<script src="_components/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script src="_cdn/js/app.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="_components/datatables/datatables.min.js"></script>
</body>
</html>