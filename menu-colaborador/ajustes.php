<?php
        session_start();

        if (isset($_SESSION['usuario_id'])) {
            
        } else {
            header("Location:../index.php");
        }
        $userid =$_SESSION['usuario_id'];
        ?>

<?php


//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost","root","","u205223607_ttt");
require_once '../Control/perfil/perfil_model.php';
require_once '../Control/perfil/perfil_tipos.php';


$des = new Perfil();
$model = new PerfilModel();

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
      
      case 'registrar':
     

        $des->__SET('id_perfil', $_REQUEST['id_perfil']);
        $des->__SET('perfil_id', $userid); 
        $des->__SET('direccion', $_REQUEST['direccion']);
        $des->__SET('usuario_ciudad', $_REQUEST['usuario_ciudad']);
        $des->__SET('usuario_estado', $_REQUEST['usuario_estado']);
        $des->__SET('codigo_postal', $_REQUEST['codigo_postal']);
        
        $des->__SET('RFC', $_REQUEST['RFC']);
        
        $INE='';
        $domicilio='';
          $perfil_img='';
          
          
          if(isset($_FILES["fot1"])){
              $file = $_FILES["fot1"];
              $nombre = $file["name"];
              $tipo = $file["type"];
              $ruta_provisional = $file["tmp_name"];
              $size = $file["size"];
              $dimensiones = getimagesize($ruta_provisional);
              $width = $dimensiones [0];
              $height = $dimensiones[1];
              $carpeta = "perfil/";
              if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                  echo "error el archivo no es imagen";
              }
              else if($size > 3*1024*1024){
                  echo "Error el tamaño maximo es de 3mb";
              }
              else{
                  $src = $carpeta.$nombre;
                  move_uploaded_file($ruta_provisional, $src);
                  $INE="perfil/".$nombre;
              }
          }
          if(isset($_FILES["fot2"])){
              $file = $_FILES["fot2"];
              $nombre = $file["name"];
              $tipo = $file["type"];
              $ruta_provisional = $file["tmp_name"];
              $size = $file["size"];
              
              $width = $dimensiones [0];
              $height = $dimensiones[1];
              $carpeta = "perfil/";
              if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                  echo "error el archivo no es imagen";
              }
              else if($size > 3*1024*1024){
                  echo "Error el tamaño maximo es de 3mb";
              }
              else{
                  $src = $carpeta.$nombre;
                  move_uploaded_file($ruta_provisional, $src);
                  $domicilio="perfil/".$nombre;
              }
          }
          if(isset($_FILES["fot3"])){
            $file = $_FILES["fot3"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "perfil/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $perfil_img="perfil/".$nombre;
            }
        }
          
        $des->__SET('INE', $INE);
        $des->__SET('domicilio', $domicilio);
        $des->__SET('perfil_img', $perfil_img);

        $model->Registrar($des);
        header('Location: ajustes_proveedor.php');
        break;
      case 'eliminar':
          $model->Eliminar($_REQUEST['id_perfil']);
          
          header('Location: ajustes_proveedor.php');
          break;

      case 'editar':
          $des = $model->Obtener($_REQUEST['id_perfil']);
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
    Proveedor
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
</head>

<body class="">
   <div class="wrapper ">
    <div class="sidebar" data-color="red">
          <div class="logo">
        
        <a class="simple-text logo-normal">
        Transportes Turisticos 
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        
       
      <ul class="nav">
        <li ><a href='ajustes.php'><i class='now-ui-icons business_badge'></i><p>Datos generales</p></a></li>
    
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
            <a class="navbar-brand" >Usuario</a>
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
      <a class="dropdown-item" href="proveedor.php">Sito</a>
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
      <div class="row">
                        
                      </div>
                      <div class="content">
                        <div class="row">
                        <div class="col-md-4">
                              <div class="card card-user">
                                  <div class="image">
                                      <img src="assets/img/bg5.jpg" alt="...">
                                  </div>
                                  <div class="card-body">
                                      <div class="author">
                                           
                         
                                             <img class="avatar border-gray" src="assets/img/mike.jpg" alt="...">
                                              
                                             <a href="#">    
                                  <?php $result = $model->Datos($userid); ?>
                                 
                                  <h5 class="title"><?php echo $result->__GET('usuario'); ?></h5>
                                  <h5 class="title"><?php echo $result->__GET('nombre_usuario'); ?> <?php echo $result->__GET('appat_usuario'); ?> <?php echo $result->__GET('apmat_usuario'); ?></h5>
                                         
                                            </a>
                                            
                                          <h6 class="title"><b><?php echo $result->__GET('edad_usuario'); ?></b></h6>
                                          <h6 class="title"><b><?php echo $result->__GET('correo_usuario'); ?></b></h6>

                                  
                                      </div>
                                     
                                  </div>
                                  
                              </div>
                          </div>

                          <div class="col-md-8">
                              <div class="card">
                                  <div class="card-header">
                                     
                                  </div>

                                  <h5 class="title">Ingresa Datos <a  href="mis_productos.php"><button class="btn btn-danger">Regresar</button></a></h5>
            
                          <div class="card-body">
                          
                            <form id="login" action="?action=<?php echo $des->id_perfil > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                              <input type="hidden" name="id_perfil"  />

                                      
                                         
                                      
                                      <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label>Dirección</label>
                                                      <input type="text" class="form-control" name="direccion" >
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-4 pr-1">
                                                  <div class="form-group">
                                                      <label>Ciudad</label>
                                                      <input type="text" class="form-control" name="usuario_ciudad">
                                                  </div>
                                              </div>
                                              <div class="col-md-4 px-1">
                                                  <div class="form-group">
                                                      <label>Estado</label>
                                                      <input type="text" class="form-control" name="usuario_estado" >
                                                  </div>
                                              </div>
                                              <div class="col-md-4 pl-1">
                                                  <div class="form-group">
                                                      <label>Postal Code</label>
                                                      <input type="number" class="form-control" name="codigo_postal">
                                                  </div>
                                              </div>
                                          </div>

    

                                      
                                      <div class="row">
                                              <div class="col-md-5 pr-1">
                                                  <div class="form-group">
                                                      <label>RFC</label>
                                                      <input type="text" class="form-control" name="RFC">
                                                  </div>
                                              </div>
                                                  <div class="col-md-3 px-1">
                                                    <div class="form">
                                                    <label>INE</label>
                                                    <input type="file" name="fot1">
                                                    </div>
                                                  </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form">
                                                      <label>Comprobante de domicilio</label>
                                                      <input type="file" name="fot2">
                                                      </div>
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <div class="form">
                                                    <label>Foto de perfil</label>
                                                    <input type="file" name="fot3">
                                                    </div>
                                                  </div>
                                                </div>

                                               <div class="row">
                                                <div class="col-md-5 pr-1">
                                                    <div class="form-group">
                                                    <button value="Aceptar" id="btnSA_1" type="submit" class="btn btn-primary btn-block">Registrar</button>
                                                     </div>
                                                     </div>
                                                    <div class="col-md-3 pr-1">
                                                    <div class="form-group">     
                                   
                                                    <a  href="ajustes_proveedor.php?action=editar&id_perfil=<?php echo $r->id_perfil; ?>"><button class="btn btn-success">Actualizar</button></a>
               
                                    </div>
                                </div>
                                            </div> 

                                      </form>

                                  </div>
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
    $("[id^='btnSA_1']").click(function (){
          swal("Listo", "Datos agregados", {
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
                  </script>,  <a target="_blank">Proveedor</a>. .
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