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
require_once '../Control/transportista/transportista_model.php';
require_once '../Control/transportista/entidad_transportista.php';


$des = new Transportista();
$model = new transportistaModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':

            $des->__SET('id_transportista', $_REQUEST['id_transportista']);
            $des->__SET('usuario_id', $userid);
            $des->__SET('nombre_empresa', $_REQUEST['nombre_empresa']);
            $des->__SET('domicilio_fiscal', $_REQUEST['domicilio_fiscal']);
            $ine='';
            $des->__SET('RFC', $_REQUEST['RFC']);
            $foto_edo_cuenta='';
            $logotipo_personal='';
            $foto_ext='';
            $foto_int='';
            $curp='';
            
            if(isset($_FILES["ine"])){
                $file = $_FILES["ine"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $ine="fotostransportista/".$nombre;
                }
            }
             
            
            if(isset($_FILES["foto_edo_cuenta"])){
                $file = $_FILES["foto_edo_cuenta"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_edo_cuenta="fotostransportista/".$nombre;
                }
            }
          
                      
            if(isset($_FILES["logotipo_personal"])){
                $file = $_FILES["logotipo_personal"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $logotipo_personal="fotostransportista/".$nombre;
                }
            }
            
           
            
            if(isset($_FILES["foto_ext"])){
                $file = $_FILES["foto_ext"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_ext="fotostransportista/".$nombre;
                }
            }
         
                        
            if(isset($_FILES["foto_int"])){
                $file = $_FILES["foto_int"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_int="fotostransportista/".$nombre;
                }
            }

        
                 
            
            if(isset($_FILES["curp"])){
                $file = $_FILES["curp"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $curp="fotostransportista/".$nombre;
                }
            }
            $des->__SET('ine', $ine);
            $des->__SET('foto_edo_cuenta', $foto_edo_cuenta);
            $des->__SET('logotipo_personal', $logotipo_personal);
            $des->__SET('foto_ext', $foto_ext);
            $des->__SET('foto_int', $foto_int);
            $des->__SET('curp', $curp);
        

            $model->Actualizar($des);
            header('Location: agregar_transportistas.php');
            break;

        case 'registrar':
            $des->__SET('id_transportista', $_REQUEST['id_transportista']);
            $des->__SET('usuario_id', $userid);
            $des->__SET('nombre_empresa', $_REQUEST['nombre_empresa']);
            $des->__SET('domicilio_fiscal', $_REQUEST['domicilio_fiscal']);
            $ine='';
            $des->__SET('RFC', $_REQUEST['RFC']);
            $foto_edo_cuenta='';
            $logotipo_personal='';
            $foto_ext='';
            $foto_int='';
            $curp='';
            
            if(isset($_FILES["ine"])){
                $file = $_FILES["ine"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $ine="fotostransportista/".$nombre;
                }
            }
             
            
            if(isset($_FILES["foto_edo_cuenta"])){
                $file = $_FILES["foto_edo_cuenta"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_edo_cuenta="fotostransportista/".$nombre;
                }
            }
          
                      
            if(isset($_FILES["logotipo_personal"])){
                $file = $_FILES["logotipo_personal"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $logotipo_personal="fotostransportista/".$nombre;
                }
            }
            
           
            
            if(isset($_FILES["foto_ext"])){
                $file = $_FILES["foto_ext"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_ext="fotostransportista/".$nombre;
                }
            }
         
                        
            if(isset($_FILES["foto_int"])){
                $file = $_FILES["foto_int"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $foto_int="fotostransportista/".$nombre;
                }
            }

        
                 
            
            if(isset($_FILES["curp"])){
                $file = $_FILES["curp"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotostransportista/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $curp="fotostransportista/".$nombre;
                }
            }
            $des->__SET('ine', $ine);
            $des->__SET('foto_edo_cuenta', $foto_edo_cuenta);
            $des->__SET('logotipo_personal', $logotipo_personal);
            $des->__SET('foto_ext', $foto_ext);
            $des->__SET('foto_int', $foto_int);
            $des->__SET('curp', $curp);
            $model->Registrar($des);
             header('Location: agregar_transportistas.php');

            break;




        case 'eliminar':
            $model->Eliminar($_REQUEST['id_transportista']);
            header('Location: agregar_transportistas.php');
            break;

        case 'editar':
            $des = $model->Obtener($_REQUEST['id_transportista']);
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
	<link rel="stylesheet" href="plugins/alertifyjs/css/themes/default.min.css"/>
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
            <a class="navbar-brand" >Transportista</a>
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
                <h4 class="card-title"> Registro Transportistas  <a  href="agregar_transportistas.php"><button class="btn btn-danger">Regresar</button></a></h4>
                <form id="login" action="?action=<?php echo $des->id_transportista > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_transportista" value="<?php echo $des->__GET('id_transportista'); ?>" />
                                        <div class="col-md-4 mb-3">
                                            <label>Nombre del Transportista</label>
                                            <input type="text" name="nombre_empresa" required="" value="<?php echo $des->__GET('nombre_empresa'); ?>"  class="form-control" placeholder="Ingresa el nombre">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Domicilio Fiscal</label>
                                            <input type="text" name="domicilio_fiscal" required="" value="<?php echo $des->__GET('domicilio_fiscal'); ?>"  class="form-control" placeholder="Ingrese domicilio fiscal">
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label>INE</label>
                                             <input type="file"  required="" name="ine" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>RFC</label>
                                            <input type="text" name="RFC" required="" value="<?php echo $des->__GET('RFC'); ?>"  class="form-control" placeholder="Ingrese su RFC">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Foto Estado de Cuenta</label>
                                             <input type="file"  required="" name="foto_edo_cuenta" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Logotipo Personal</label>
                                             <input type="file"  required="" name="logotipo_personal" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Foto del Exterior del Lugar</label>
                                             <input type="file"  required="" name="foto_ext" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Foto del Interior del Lugar</label>
                                             <input type="file"  required="" name="foto_int" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Curp</label>
                                             <input type="file"  required="" name="curp" class="form-control" >
                                        </div>
                                        

                                        <div class="row form-group">
                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                        
                                        
                                        <input id="btnSA_1"  type="submit" class="btn btn-primary btn-block" value="Aceptar">


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
        	swal("Listo", "Transportista agregado", {
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
            </script>,  <a target="_blank">Transportista</a>. .
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