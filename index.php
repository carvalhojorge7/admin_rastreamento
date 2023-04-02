<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['cod'])) {

        $url = 'http://127.0.0.1:8000/api/rastrear_pacote/' . $_GET['cod'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
    }
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rastreamento de Encomendas</title>
    <meta name="description" content="Rastreamento de encomendas em tempo real. Acompanhe sua entrega de maneira fácil e segura.">
    <meta name="keywords" content="rastreamento, encomendas, entregas, correios, transportadora">
    <meta name="author" content="Rastreio.de">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="robots" content="noodp">
    <meta name="language" content="Portuguese">
    <link rel="canonical" href="https://rastreio.de">
    <meta property="og:title" content="Rastreamento de Encomendas">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://rastreio.de">
    <!-- <meta property="og:image" content="https://rastreio.de/images/logo.png"> -->
    <meta property="og:description" content="Rastreamento de encomendas em tempo real. Acompanhe sua entrega de maneira fácil e segura.">
    <meta property="og:site_name" content="Rastreio.de">
    <meta property="og:locale" content="pt_BR">
    <meta name="twitter:title" content="Rastreamento de Encomendas">
    <!-- <meta name="twitter:image" content="https://rastreio.de/images/logo.png"> -->
    <meta name="twitter:description" content="Rastreamento de encomendas em tempo real. Acompanhe sua entrega de maneira fácil e segura.">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminRastreio</span>
                </a>

                <div class="navbar">

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3" method="get" action="">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="cod" id="cod" type="search" placeholder="Rastrear Encomenda" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">

                                    <?php
                                    if (isset($response->data)) {
                                        $last_date = $response->data->historico[0]->data_atualizado_em;
                                        echo '<div class="timeline">';
                                        echo '<div class="time-label">
                                                <span class="bg-blue">' . $response->data->historico[0]->data_atualizado_em . '</span>
                                            </div>';
                                        foreach ($response->data->historico as $dados) {
                                            $data = $dados->data_atualizado_em;
                                            switch ($dados->status) {
                                                case 'Despachando':
                                                    $alert = 'primary';
                                                    $color = 'blue';
                                                    break;
                                                case 'Em Trânsito':
                                                    $alert = 'success';
                                                    $color = 'green';
                                                    break;
                                                case 'Saiu Para Entrega':
                                                    $alert = 'secondary';
                                                    $color = 'gray';
                                                    break;
                                                case 'Entregue':
                                                    $alert = 'warning';
                                                    $color = 'yellow';
                                                    break;
                                            }
                                            if ($data == $last_date) {
                                                echo '
                                                <div>
                                                    <i class="fas fa-truck bg-' . $color . '"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> ' . $dados->hora_atualizado_em . '</span>
                                                        <h3 class="timeline-header"><span class="badge badge-' . $alert . '">' . $dados->status . '</span></h3>
                                                        <div class="timeline-body">
                                                        ' . $dados->detalhes . '
                                                        </div>
                                                    </div>
                                                </div>';
                                            } else {
                                                echo '
                                                <div class="time-label">
                                                    <span class="bg-' . $color . '">' . $dados->data_atualizado_em . '</span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-truck bg-' . $color . '"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> ' . $dados->hora_atualizado_em . '</span>
                                                        <h3 class="timeline-header"><span class="badge badge-' . $alert . '">' . $dados->status . '</span></h3>
                                                        <div class="timeline-body">
                                                        ' . $dados->detalhes . '
                                                        </div>
                                                    </div>
                                                </div>';
                                            }

                                            $last_date = $data;
                                        }

                                        echo '<div>
                                                <i class="fas fa-clock bg-gray"></i>
                                            </div>
                                        </div>';
                                    } else {
                                        echo 'Nenhum pacote encontrado';
                                    }
                                    ?>




                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Origem:</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title"><?php echo isset($response->data->pedido) ? 'ultrabyteshop' : '-'; ?></h6>

                                    <p class="card-text"><?php echo isset($response->data->pedido) ? 'Pedido criado por ultrabyteshop.com.br' : ''; ?></p>

                                    <?php echo isset($response->data->pedido) ? '<a href="https://ultrabyteshop.com.br" class="btn btn-primary">Visitar a loja</a>' : ''; ?>

                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Destino</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title"><?php echo isset($response->data->cliente) ? $response->data->cliente : '-'; ?></h6>

                                    <p class="card-text"><?php echo isset($response->data->destino) ? $response->data->destino : ''; ?></p>
                                    <p class="card-text"><?php echo isset($response->data->cep) ? $response->data->cep : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">AdminRastre.io</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Versão</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>