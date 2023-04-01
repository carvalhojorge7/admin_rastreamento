<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2ODAzNTg5MTcsImV4cCI6MTY4MTU2ODUxNywibmJmIjoxNjgwMzU4OTE3LCJqdGkiOiJLY2xkU1pFWFdNcnBzak9iIiwic3ViIjoiNCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.aE7mAQYoi5bL4D_nFhCJN12oj8-PVRmR2D22VJwdY1M';

  $url = 'http://127.0.0.1:8000/api/busca/pacotes';

  // Define os dados do formulário
  $data = array(
    'id' => $_POST['id'] ?? null,
    'pedido' => $_POST['pedido'] ?? null,
    'cliente' => $_POST['cliente'] ?? null,
    'status' => $_POST['status'] ?? null,
    'previsao' => $_POST['previsao'] ?? null,
    'detalhes' => $_POST['detalhes'] ?? null,
  );

  $data_json = json_encode($data);

  $ch = curl_init();

  // Define as opções da requisição
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

  $response = curl_exec($ch);

  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  $response = json_decode($response);
}
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Rastreio 1.0</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_pacote.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Novo Pacote
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-search-location"></i>
                <p>
                  Rastrear Pacote
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Rastrear Pacote</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Rastrear Pacote</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Buscar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php if (isset($response->msg)) {
                echo '
                  <!-- ALERT -->
                  <div class="alert alert-' . $response->alert . ' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> ' . $response->msg . '</h5>
                  </div>
                  <!-- /ALERT -->';
              }
              ?>
              <div class="row">
                <div class="col-md-6">
                  <!-- inicio busca -->
                  <div class="form-group">
                    <form method="POST">
                      <div class="input-group mb-3">
                        <input type="text" name="pedido" id="pedido" class="form-control rounded-0" <?php if (isset($response->data->pedido)) {
                                                                                                      echo "value='" . $response->data->pedido . "'";
                                                                                                    } else {
                                                                                                      echo "placeholder='Código do Pedido'";
                                                                                                    } ?>>
                        <span class="input-group-append">
                          <button type="submmit" class="btn btn-info btn-flat">Buscar</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- Fim busca -->
                </div>
                <!-- /.col -->
              </div>
            </div><!-- /.container-fluid -->
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Dados do Pacote</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pedido</label>
                      <input class="form-control" name="pedido" id="pedido" type="text" value='<?php if (isset($response->data->pedido)) {
                                                                                                  echo $response->data->pedido;
                                                                                                } else {
                                                                                                  echo 'Código do Pedido';
                                                                                                } ?>' readonly>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Cliente</label>
                      <input class="form-control" name="cliente" id="cliente" type="text" value='<?php if (isset($response->data->cliente)) {
                                                                                                    echo $response->data->cliente;
                                                                                                  } else {
                                                                                                    echo 'Nome do Cliente';
                                                                                                  } ?>'>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status" id="status" style="width: 100%;">
                        <option selected="selected"><?php if (isset($response->data->status)) {
                                                      echo $response->data->status;
                                                    } else {
                                                      echo '';
                                                    } ?></option>
                        <option>Despachando</option>
                        <option>Em Trânsito</option>
                        <option>Saiu Para Entrega</option>
                        <option>Entregue</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Previsão de Entrega:</label>
                      <div class="input-group date">
                        <input type="text" name="previsao" id="previsao" class="form-control datepicker-input" data-target="#reservationdate" value='<?php if (isset($response->data->previsao)) {
                                                                                                                                                        echo $response->data->previsao;
                                                                                                                                                      } else {
                                                                                                                                                        echo '01/01/1991';
                                                                                                                                                      } ?>' />
                        <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Detalhes</label>
                        <textarea class="form-control" name="detalhes" id="detalhes" rows="5"><?php if (isset($response->data->detalhes)) {
                                                                                                echo $response->data->detalhes;
                                                                                              } ?></textarea>
                      </div>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php if (isset($response->data->id)) {
                                                                  echo $response->data->id;
                                                                } ?>">

                  <!-- /.col -->
                  <button type="submit" class="btn btn-block bg-gradient-primary">Atualizar Status do Pedido</button>
                </div>
              </form>
            </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="#">AdminRastre.io</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Versão</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script>
    //Date picker
    $(function() {
      $('input[data-target="#reservationdate"]').daterangepicker({
        "singleDatePicker": true,
        "autoApply": true,
        "locale": {
          "format": "DD/MM/YYYY",
          "separator": "/",
          "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sab"
          ],
          "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
          ],
          "firstDay": 1,
        }
      });
    });
  </script>
</body>

</html>