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

require_once '../Control/autor/autor_model.php';
require_once '../Control/autor/autor_entidad.php';


$des = new Autor();
$model = new AutorModel();

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
      case 'actualizar':
          $des->__SET('id_destino', $_REQUEST['id_destino']);
          $des->__SET( 'usuario_id', $userid); 
          $des->__SET('nom_destinos', $_REQUEST['nom_destinos']);
          $des->__SET('id_estado', $_REQUEST['id_estado']);
          $des->__SET('ubicacion_geografica', $_REQUEST['ubicacion_geografica']);
          $des->__SET('referencias', $_REQUEST['referencias']);
          $img_destinos='';
          $img1_des='';
          $img2_des='';
          $img3_des='';
           
          if(isset($_FILES["foto"])){
            $file = $_FILES["foto"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "../fotoses/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img_destinos="fotoses/".$nombre;
            }
        }
        if(isset($_FILES["foto1"])){
          $file = $_FILES["foto1"];
          $nombre = $file["name"];
          $tipo = $file["type"];
          $ruta_provisional = $file["tmp_name"];
          $size = $file["size"];
          $dimensiones = getimagesize($ruta_provisional);
          $width = $dimensiones [0];
          $height = $dimensiones[1];
          $carpeta = "../fotoses/";
          if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
              echo "error el archivo no es imagen";
          }
          else if($size > 3*1024*1024){
              echo "Error el tamaño maximo es de 3mb";
          }
          else{
              $src = $carpeta.$nombre;
              move_uploaded_file($ruta_provisional, $src);
              $img1_pro="fotoses/".$nombre;
          }
      }
      if(isset($_FILES["foto2"])){
          $file = $_FILES["foto2"];
          $nombre = $file["name"];
          $tipo = $file["type"];
          $ruta_provisional = $file["tmp_name"];
          $size = $file["size"];
          
          $width = $dimensiones [0];
          $height = $dimensiones[1];
          $carpeta = "../fotoses/";
          if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
              echo "error el archivo no es imagen";
          }
          else if($size > 3*1024*1024){
              echo "Error el tamaño maximo es de 3mb";
          }
          else{
              $src = $carpeta.$nombre;
              move_uploaded_file($ruta_provisional, $src);
              $img2_pro="fotoses/".$nombre;
          }
      }
      if(isset($_FILES["foto3"])){
          $file = $_FILES["foto3"];
          $nombre = $file["name"];
          $tipo = $file["type"];
          $ruta_provisional = $file["tmp_name"];
          $size = $file["size"];
          
          $width = $dimensiones [0];
          $height = $dimensiones[1];
          $carpeta = "../fotoses/";
          if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
              echo "error el archivo no es imagen";
          }
          
          else if($size > 3*1024*1024){
              echo "Error el tamaño maximo es de 3mb";
          }
          else{
              $src = $carpeta.$nombre;
              move_uploaded_file($ruta_provisional, $src);
              $img3_pro="fotoses/".$nombre;
          }
      }
         $des->__SET('img_destinos', $img_destinos);
         $des->__SET('img1_des', $img1_des);
         $des->__SET('img2_des', $img2_des);
         $des->__SET('img3_des', $img3_des);
          
          $des->__SET('status', $_REQUEST['status']);



          $model->Actualizar($des);
          header('Location: agregar_cronicas.php');
          break;

      case 'registrar':
          $des->__SET('id_destino', $_REQUEST['id_destino']);
          $des->__SET( 'usuario_id', $userid); 
          $des->__SET('nom_destinos', $_REQUEST['nom_destinos']);
          $des->__SET('id_estado', $_REQUEST['id_estado']);
          $des->__SET('ubicacion_geografica', $_REQUEST['ubicacion_geografica']);
          $des->__SET('referencias', $_REQUEST['referencias']);
          $img_destinos='';
          $img1_des='';
         $img2_des='';
         $img3_des='';
          
          if(isset($_FILES["foto"])){
              $file = $_FILES["foto"];
              $nombre = $file["name"];
              $tipo = $file["type"];
              $ruta_provisional = $file["tmp_name"];
              $size = $file["size"];
              $dimensiones = getimagesize($ruta_provisional);
              $width = $dimensiones [0];
              $height = $dimensiones[1];
              $carpeta = "../fotoses/";
              if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                  echo "error el archivo no es imagen";
              }
              else if($size > 3*1024*1024){
                  echo "Error el tamaño maximo es de 3mb";
              }
              else{
                  $src = $carpeta.$nombre;
                  move_uploaded_file($ruta_provisional, $src);
                  $img_destinos="fotoses/".$nombre;
              }
          }
          if(isset($_FILES["foto1"])){
            $file = $_FILES["foto1"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "../fotoses/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img1_pro="fotoses/".$nombre;
            }
        }
        if(isset($_FILES["foto2"])){
            $file = $_FILES["foto2"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "../fotoses/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img2_pro="fotoses/".$nombre;
            }
        }
        if(isset($_FILES["foto3"])){
            $file = $_FILES["foto3"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "../fotoses/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img3_pro="fotoses/".$nombre;
            }
        }
        $des->__SET('img_destinos', $img_destinos);
        $des->__SET('img1_des', $img1_des);
        $des->__SET('img2_des', $img2_des);
        $des->__SET('img3_des', $img3_des);
          
          $des->__SET('status', 0);
          $model->Registrar($des);
          header('Location: agregar_cronicas.php#pricing');

          break;

          case 'editar':
          $des = $model->Obtener($_REQUEST['id_destino']);
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
    Autor
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
	<link rel="stylesheet" href="plugins/alertifyjs/css/themes/default.min.css"/> 
</head>

<!-- Ejemplo de reutilización de códgio -->
<?php // require 'layout/header.php';?>
<?php // require 'layout/menu.php'; ?>

<!-- Contenido diferente -->

<?php // require 'layout/footer.php'; ?>

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
            <a class="navbar-brand" >Autor</a>
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
      <a class="dropdown-item" href="autorp.php">Sito</a>
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
                <h4 class="card-title">Publicar destino <a  href="lista_cronicas.php"><button class="btn btn-danger">Regresar</button></a></h4>
                  <form id="login" action="?action=<?php echo $des->id_destino > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_destino" value="<?php echo $des->__GET('id_destino'); ?>" />
                                        <div class="form-group">
                                            <label>Nombre Destino</label>
                                            <input type="text" name="nom_destinos" required="" value="<?php echo $des->__GET('nom_destinos'); ?>"  class="form-control" placeholder="Ingresa nombre del destino">
                                        </div>

                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" name="id_estado">
                                    <option class="form-control" value="0">Seleccione un Estado</option>
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
                                            <label>Ubicación Geográfica</label>
                                            <input type="text" name="ubicacion_geografica" required="" value="<?php echo $des->__GET('ubicacion_geografica'); ?>"  class="form-control" placeholder="Ingresa ubicacion geografica">
                                        </div>
                                        <div class="form-group">
                                            <label>Reseña del lugar</label>
                                            <input type="text" name="referencias" required="" value="<?php echo $des->__GET('referencias'); ?>"  class="form-control" placeholder="Ingresa reseña">
                                        </div>
                                        
                                        <div class="row fom">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen principal</label>
                                        <br>
                                        <input type="file" name="foto" required>
                                        
                                    </div>
                                </div>
                                
                                <div class="row form">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen</label>
                                        <br>
                                        <input type="file" name="foto1">
                                    </div>
                                </div>
                                <div class="row form">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen</label>
                                        <br>
                                         <input type="file" name="foto2"  >
                                    </div>
                                </div>
                                <div class="row form">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen</label>
                                        <br>
                                         <input type="file" name="foto3"  >
                                    </div>
                                </div>
                                   
                                        <div class="row form-group">
                                    <div class="col-md-12">
                                        <input id="btnSA_1"  type="submit" class="btn btn-success btn-block" value="Aceptar">


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
		$("[id^='btnSA_1']").click(function (){
        	swal("Listo", "Destino agregado", {
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
            </script>,  <a target="_blank">Autor</a>. .
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