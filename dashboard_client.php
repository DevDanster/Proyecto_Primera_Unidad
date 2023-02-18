<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Client - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
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
        <div class="sidebar-brand-text mx-3">Cliente</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_client.php">
          <i class="fi fi-sr-home"></i>
          <span>Inicio</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Opciones
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Cotizar</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cotizar</h6>
            <a class="collapse-item" href="cotizar.php">
              Servicios
            </a>
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
            <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Inicio</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- modal vertically centered -->
              <h3 class="m-0 font-weight-bold text-primary">Salones CH</h3>
              <img class="img-salon" src="img/salon3.png">
            </div>

            <div class="col-lg-6">
              <!-- Modal with scrolling long content -->
              <div class="card mb-4">

                <div class="card-body">

                  <h3 class="desc-salon">¿Necesitas el espacio perfecto para tu evento especial?
                    <br><br> !Tenemos lo que necesitas para hacer de tu evento algo inolvidable¡<br><br>
                    Ofrecemos una amplia variedad de opciones de espacios elegantes y sofisticados hasta lugares más relajados y acogedores.<br><br>
                    Con nuestro servicio de renta, podrás elegir el salón que mejor se adapte a tus necesidades y presupuesto.<br>Además, te ofrecemos servicios adicionales como decoración y equipo audiovisual para que puedas disfrutar de un evento sin preocupaciones.
                    <br><br>¡Haz de tu evento algo especial con nuestro servicio de renta de salones de eventos!
                  </h3>

                </div>
              </div>
            </div>

          </div>
          <!-- Row -->

        </div>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">


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
          <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Carlos Daniel Chandoquí Ruíz - 19270592 &copy; <script>
                  document.write(new Date().getFullYear());
                </script>
              </span>
            </div>
          </div>
        </footer>
        <!-- Footer -->
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>