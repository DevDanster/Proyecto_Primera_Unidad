<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>CHAdmin - Cotizar</title>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>
<?php
session_start();

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['username']) || $_SESSION['logged_in'] !== true) {
  header('Location: login.php');
  exit;
}
?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">CHAdmin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="dashboard_client.php">
          <i class="fi fi-sr-home"></i>
          <span>Inicio</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Opciones
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Cotizar</span>
        </a>
        <div id="collapseBootstrap" class="collapse show" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cotizar</h6>
            <a class="collapse-item active" href="cotizar.php">Servicios</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img class="img-profile rounded-circle" src="<?= $_SESSION['profile_pic'] ?>" style="max-width: 60px">

                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username']; ?></span>

              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>

              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Cotizar</li>
              <li class="breadcrumb-item active" aria-current="page">Servicios</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- modal vertically centered -->
              <div class="card mb-4">
                <div class="card-body">

                  <body>

                    <?php
                    if (isset($_POST['calcular'])) {
                      $services = $_POST['services'];
                      if (!empty($services)) {
                        $total = 0;

                        echo "<h1>Resumen de Servicios</h1>";
                        echo "<ul>";

                        foreach ($services as $service) {
                          
                          echo "<p> ✔ " . $service . " </p>";
                          if ($service == "renta-local-40") {
                            $total += 2400;
                          } elseif ($service == "renta-local-50") {
                            $total += 3000;
                          } elseif ($service == "renta-local-120") {
                            $total += 7000;
                          } elseif ($service == "aire-acondicionado") {
                            $total += 500;
                          } elseif ($service == "manteleria") {
                            $total += 450;
                          } elseif ($service == "mesas") {
                            $total += 800;
                          } elseif ($service == "sillas") {
                            $total += 750;
                          } elseif ($service == "iluminacion") {
                            $total += 1200;
                          } elseif ($service == "sonido") {
                            $total += 1800;
                          } elseif ($service == "banquete") {
                            $total += 1400;
                          } elseif ($service == "decoracion") {
                            $total += 1100;
                          }
                        }
                      } 			echo "<h2>Costo Total: $" . $total . " MXN</h2>";
                    } 

                    ?>


                    <a href="cotizar.php">
                      <input type="submit" value="Regresar" class="btn btn-sm btn-primary">
                    </a>
                  </body>
                </div>
              </div>
            </div>
            <!-- Row -->

          </div>
          <!---Container Fluid-->
        </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>¿Estas seguro que deseas cerrar tu sesión?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>

                  <form action="proc_logout.php" method="post">
                    <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>

</html>