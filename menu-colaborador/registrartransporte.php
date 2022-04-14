<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
} else {
  header("Location:../index.php");
}
$userid = $_SESSION['usuario_id'];
?>
<?php



//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost", "root", "", "u205223607_ttt");
require_once '../Control/Transporte/transporte_model.php';
require_once '../Control/Transporte/entidad_transporte.php';


$des = new Transporte();
$model = new transporteModel();

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'actualizar':
      $des->__SET('id_transporte', $_REQUEST['id_transporte']);
      $des->__SET('usuario_id', $userid);
      $des->__SET('nom_transporte', $_REQUEST['nom_transporte']);
      $des->__SET('id_tipot', $_REQUEST['id_tipot']);
      $img_transporte = '';

      if (isset($_FILES["img_transporte"])) {
        $file = $_FILES["img_transporte"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../fotostransportista/";
        if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG') {
          echo "error el archivo no es imagen";
        } else if ($size > 3 * 1024 * 1024) {
          echo "Error el tamaño maximo es de 3mb";
        } else {
          $src = $carpeta . $nombre;
          move_uploaded_file($ruta_provisional, $src);
          $img_transporte = "fotostransportista/" . $nombre;
        }
      }
      $des->__SET('img_transporte', $img_transporte);
      $des->__SET('link_youtube', $_REQUEST['link_youtube']);
      $des->__SET('descripcion', $_REQUEST['descripcion']);
      $des->__SET('incluye', $_REQUEST['incluye']);
      $des->__SET('no_incluye', $_REQUEST['no_incluye']);
      $des->__SET('id_estado', $_REQUEST['id_estado']);
      $des->__SET('zona_cobertura', $_REQUEST['zona_cobertura']);
      $des->__SET('ubicacion_transporte', $_REQUEST['ubicacion_transporte']);
      $des->__SET('contacto_transporte', $_REQUEST['contacto_transporte']);
      $des->__SET('statust', 0);


      $model->Actualizar($des);
      header('Location: agregar_transportes.php');
      break;

    case 'registrar':
      $des->__SET('id_transporte', $_REQUEST['id_transporte']);
      $des->__SET('usuario_id', $userid);
      $des->__SET('nom_transporte', $_REQUEST['nom_transporte']);
      $des->__SET('id_tipot', $_REQUEST['id_tipot']);
      $img_transporte = '';

      if (isset($_FILES["img_transporte"])) {
        $file = $_FILES["img_transporte"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../fotostransportista/";
        if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG') {
          echo "error el archivo no es imagen";
        } else if ($size > 3 * 1024 * 1024) {
          echo "Error el tamaño maximo es de 3mb";
        } else {
          $src = $carpeta . $nombre;
          move_uploaded_file($ruta_provisional, $src);
          $img_transporte = "fotostransportista/" . $nombre;
        }
      }
      $des->__SET('img_transporte', $img_transporte);
      $des->__SET('link_youtube', $_REQUEST['link_youtube']);
      $des->__SET('descripcion', $_REQUEST['descripcion']);
      $des->__SET('incluye', $_REQUEST['incluye']);
      $des->__SET('no_incluye', $_REQUEST['no_incluye']);
      $des->__SET('id_estado', $_REQUEST['id_estado']);
      $des->__SET('zona_cobertura', $_REQUEST['zona_cobertura']);
      $des->__SET('ubicacion_transporte', $_REQUEST['ubicacion_transporte']);
      $des->__SET('contacto_transporte', $_REQUEST['contacto_transporte']);
      $des->__SET('statust', 0);

      $model->Registrar($des);

      header('Location: agregar_transportes.php');

      break;

    case 'eliminar':
      $model->Eliminar($_REQUEST['id_transporte']);
      header('Location: agregar_transportes.php');
      break;

    case 'editar':
      $des = $model->Obtener($_REQUEST['id_transporte']);
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Transportista
  </title>


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />


  <!-- Alertify CSS -->
  <link rel="stylesheet" href="plugins/alertifyjs/css/alertify.min.css">
  <!-- Alertify theme default -->
  <link rel="stylesheet" href="plugins/alertifyjs/css/themes/default.min.css" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a class="simple-text logo-normal">
          Transportes Turisticos
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">


        <ul class="nav">
          <li><a href='ajustes.php'><i class='now-ui-icons business_badge'></i>
              <p>Datos generales</p>
            </a></li>

          <?php

          require 'common-menu.php';

          ?>

        </ul>

      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Transportista</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons ui-1_settings-gear-63"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Acciones</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="transportista.php">Sito</a>
                  <a class="dropdown-item" href="cerrar_sesion.php">Cerrar Sesión</a>
                </div>
              </li>
            </ul>


          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registra Los Transportes <a href="agregar_transportes.php"><button class="btn btn-danger">Regresar</button></a></h4>
                <form id="login" action="?action=<?php echo $des->id_transporte > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_transporte" value="<?php echo $des->__GET('id_transporte'); ?>" />

                  <div class="form-group">
                    <label>Nombre del transporte</label>
                    <input type="text" name="nom_transporte" required="" value="<?php echo $des->__GET('nom_transporte'); ?>" class="form-control" placeholder="Ingresa el nombre del transporte" required>
                  </div>


                  <div class="form-group">
                    <label for="date-start">Tipo de Transporte </label>
                    <select class="form-control" name="id_tipot" required>
                      <option value=" 1 "> Limosina </option>
                      <option value=" 2 "> Vagoneta</option>
                      <option value=" 3 "> Autobus </option>
                      <option value=" 4 "> Auto (4 puertas) </option>
                    </select>
                  </div>


                  <div>
                    <label>Imagen del Transporte</label>
                    <input type="file" required="" name="img_transporte" value="<?php echo $des->__GET('img_transporte'); ?>" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Link de YouTube</label>
                    <input type="text" name="link_youtube" required="" value="<?php echo $des->__GET('link_youtube'); ?>" class="form-control" placeholder="Ingresa tu link" required>
                  </div>
                  <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" name="descripcion" required="" value="<?php echo $des->__GET('descripcion'); ?>" class="form-control" placeholder="Ingresa la Descripcion" required>
                  </div>


                  <div class="form-group">
                    <label>Incluye</label>
                    <input type="text" name="incluye" required="" value="<?php echo $des->__GET('incluye'); ?>" class="form-control" placeholder="Ingresa lo que incluye" required>
                  </div>
                  <div class="form-group">
                    <label>No incluye</label>
                    <input type="text" name="no_incluye" required="" value="<?php echo $des->__GET('no_incluye'); ?>" class="form-control" placeholder="Ingresa lo que no incluye" required>
                  </div>

                  <div class="form-group">
                    <label>Nombre del Estado</label>
                    <select class="form-control" name="id_estado" required>
                      <option value="1">Ciudad de México</option>
                      <option value="33">Aguascalientes</option>
                      <option value="2">Baja California Norte</option>
                      <option value="3">Baja California Sur</option>
                      <option value="4">Campeche</option>
                      <option value="5">Chiapas</option>
                      <option value="6">Chihuahua</option>
                      <option value="7">Coahuila</option>
                      <option value="8">Colima</option>
                      <option value="9">Durango</option>
                      <option value="12">Estado de México</option>
                      <option value="13">Guanajuato</option>
                      <option value="14">Guerrero</option>
                      <option value="15">Hidalgo</option>
                      <option value=" 10">Jalisco</option>
                      <option value="16">Michoacán</option>
                      <option value="17">Morelos</option>
                      <option value="18">Nayarit</option>
                      <option value="19">Nuevo León</option>
                      <option value="20">Oaxaca</option>
                      <option value="21">Puebla</option>
                      <option value="22">Querétaro</option>
                      <option value="23">Quintana Roo</option>
                      <option value="24">San Luis Potosí</option>
                      <option value="25">Sinaloa</option>
                      <option value="26">Sonora</option>
                      <option value="27">Tabasco</option>
                      <option value="28">Tamaulipas</option>
                      <option value="29">Tlaxcala</option>
                      <option value="30">Veracruz</option>
                      <option value="31">Yucatán</option>
                      <option value="32">Zacatecas</option>

                    </select>

                  </div>
                  <div class="form-group">
                    <label>Zona de Cobertura</label>
                    <input type="text" name="zona_cobertura" required="" value="<?php echo $des->__GET('zona_cobertura'); ?>" class="form-control" placeholder="Ingresa la zona de cobertura" required>
                  </div>
                  <div class="form-group">
                    <label>Ubicación del sevicio</label>
                    <input type="text" name="ubicacion_transporte" required="" value="<?php echo $des->__GET('ubicacion_transporte'); ?>" class="form-control" placeholder="Ingresa el link de la ubicación del servicio" required>
                  </div>
                  <div class="form-group">
                    <label>Contacto</label>
                    <input type="number" minlength="10" name="contacto_transporte" required="" value="<?php echo $des->__GET('contacto_transporte'); ?>" class="form-control" placeholder="Ingresa el link de tu Whats App" required>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <input id="btnSA_1" type="submit" class="btn btn-success btn-block" value="Aceptar">


                    </div>
                  </div>
                </form>
              </div>
            </div>




          </div>
        </div>

      </div>
      <!--jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="JQuery/jquery-3.3.1.min.js"></script>
      <!--Popper.js-->
      <script src="Popper/popper.min.js"></script>


      <!-- Plugin Sweet alert -->
      <script src="plugins/sweetalert/sweetalert.min.js"></script>
      <!-- Plugins Alertify -->
      <script src="plugins/alertifyjs/js/alertify.min.js"></script>

      <script>
        //Sweet Alert		
        $("[id^='btnSA_1']").click(function() {
          swal("Listo", "Transporte agregado", {
            icon: "success"
          });


        });
      </script>

      <footer class="footer">
        <div class=" container-fluid ">
          <nav>

          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, <a target="_blank">Transportista</a>. .
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <link href="vendor/datetimepicker-master/build/jquery.datetimepicker.min.css" rel="stylesheet" />
  <link href="css/sweetalert.css" rel="stylesheet" />
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>