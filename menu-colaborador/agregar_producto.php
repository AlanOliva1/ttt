
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

require_once '../Control/producto/producto_model.php';
require_once '../Control/producto/entidad_producto.php';




$des = new Producto();
$model = new ProductoModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $des->__SET('id_pro', $_REQUEST['id_pro']);
            $des->__SET( 'usuario_id', $userid); 
           $des->__SET('nombre_pro', $_REQUEST['nombre_pro']);
           $des->__SET('marca_pro', $_REQUEST['marca_pro']);
           $des->__SET('modelo_pro', $_REQUEST['modelo_pro']);
           $des->__SET('categoria_pro', $_REQUEST['categoria_pro']);
           $des->__SET('condicion_pro', $_REQUEST['condicion_pro']);
           $img1_pro='';
           $img2_pro='';
           $img3_pro='';
           
           if(isset($_FILES["foto1"])){
            $file = $_FILES["foto1"];
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones [0];
            $height = $dimensiones[1];
            $carpeta = "../fotos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img1_pro="fotos/".$nombre;
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
            $carpeta = "../fotos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img2_pro="fotos/".$nombre;
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
            $carpeta = "../fotos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                echo "error el archivo no es imagen";
            }
            
            else if($size > 3*1024*1024){
                echo "Error el tamaño maximo es de 3mb";
            }
            else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $img3_pro="fotos/".$nombre;
            }
        }
           $des->__SET('img1_pro', $img1_pro);
           $des->__SET('img2_pro', $img2_pro);
           $des->__SET('img3_pro', $img3_pro);
           $des->__SET('precio_pro', $_REQUEST['precio_pro']);
           $des->__SET('garantia_pro', $_REQUEST['garantia_pro']);
           $des->__SET('descripcion_pro', $_REQUEST['descripcion_pro']);
           $des->__SET('estatus_pro', 0);
           

            $model->Actualizar($des);
            
            
            header('Location: agregar_producto.php#pricing');
            break;

        case 'registrar':


            $des->__SET('id_pro', $_REQUEST['id_pro']);
             $des->__SET( 'usuario_id', $userid); 
            $des->__SET('nombre_pro', $_REQUEST['nombre_pro']);
            $des->__SET('marca_pro', $_REQUEST['marca_pro']);
            $des->__SET('modelo_pro', $_REQUEST['modelo_pro']);
            $des->__SET('categoria_pro', $_REQUEST['categoria_pro']);
            $des->__SET('condicion_pro', $_REQUEST['condicion_pro']);
            $img1_pro='';
            $img2_pro='';
            $img3_pro='';
            
            if(isset($_FILES["foto1"])){
                $file = $_FILES["foto1"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../fotos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img1_pro="fotos/".$nombre;
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
                $carpeta = "../fotos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img2_pro="fotos/".$nombre;
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
                $carpeta = "../fotos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img3_pro="fotos/".$nombre;
                }
            }
            $des->__SET('img1_pro', $img1_pro);
            $des->__SET('img2_pro', $img2_pro);
            $des->__SET('img3_pro', $img3_pro);
            $des->__SET('precio_pro', $_REQUEST['precio_pro']);
            $des->__SET('garantia_pro', $_REQUEST['garantia_pro']);
            $des->__SET('descripcion_pro', $_REQUEST['descripcion_pro']);
            $des->__SET('estatus_pro', 0);
            $model->Registrar($des);
            
          header('Location: agregar_producto.php');
            
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_pro']);
            
            header('Location: agregar_producto.php');
            break;

        case 'editar':
            $des = $model->Obtener($_REQUEST['id_pro']);
            break;
    }
}
?>

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
  <!-- Bootstrap CSS -->
 
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
            <a class="navbar-brand" >Proveedor</a>
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
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <h4 class="card-title"> Agregar Producto <a  href="mis_productos.php"><button class="btn btn-danger">Regresar</button></a></h4>
            <div class="modal-body">
            <form id="login" action="?action=<?php echo $des->id_pro > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pro" value="<?php echo $des->__GET('id_pro'); ?>" />

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Nombre</label>
                                        <input type="text" name="nombre_pro"   value="<?php echo $des->__GET('nombre_pro'); ?>"  class="form-control" placeholder="Ingresa el nombre del producto" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Marca</label>
                                        <input type="text" name="marca_pro"   value="<?php echo $des->__GET('marca_pro'); ?>"  class="form-control" placeholder="Ingresa la marca del producto" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Modelo</label>
                                        <input type="text" name="modelo_pro"   value="<?php echo $des->__GET('modelo_pro'); ?>"  class="form-control" placeholder="Ingresa el modelo del producto" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Categoría</label><br>
                                        <select class="form-control" name="categoria_pro" value="foto1"id="">
                                            <option value="0">Elige una opcion</option>
                                            <option value="Alpinismo">Alpinismo</option>
                                            <option value="Equipaje">Equipaje</option>
                                            <option value="Natación">Natación</option>
                                            <option value="Limpieza Personal">Limpieza Personal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Condición</label><br>
                                        <select class="form-control" name="condicion_pro" value="<?php echo $des->__GET('condicion_pro'); ?>" id="">
                                            <option value="0">Elige una opcion</option>
                                            <option value="Nuevo">Nuevo</option>
                                            <option value="Usado">Usado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row fom">
                                    <div class="col-md-12">
                                        <label for="file-start">Agrega imagen</label>
                                        <br>
                                        <input type="file" name="foto1" required  value="<?php echo $des->__GET('img1_pro'); ?>">
                                        
                                    </div>
                                </div>
                                
                                <div class="row form">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen Posterior</label>
                                        <br>
                                      
                                        <input type="file" name="foto2">
                                    </div>
                                </div>
                                <div class="row form">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen Perfil</label>
                                        <br>
                                         <input type="file" name="foto3"  >
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Precio</label>
                                        <input type="number" name="precio_pro"  value="<?php echo $des->__GET('precio_pro'); ?>" class="form-control" placeholder="Ingresa el precio." required>
                                    </div>
                                </div>
                                <div class="btn_group" data_toggle="buttons">
                                <label for="date-start">Garantia</label><br>
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="garantia_pro" id="option1" autocomplete="off" checked value="Garatía del Vendedor">Garatía del Vendedor
                                    </label> <br>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="garantia_pro" id="option2" autocomplete="off" checked value="Garantía de fábrica">Garantía de fábrica
                                    </label><br>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="garantia_pro" id="option3" autocomplete="off" checked value="Sin Garantía">Sin Garantía
                                    </label>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Descripcion</label>
                                        <input type="text" name="descripcion_pro"  value="<?php echo $des->__GET('descripcion_pro'); ?>"  class="form-control" placeholder="Ingresa la descripción del producto." required>
                                    </div>
                                </div>
                                


                                <div class="row form-group">
                                    <div class="col-md-12">
                                        
                                    <button value="Aceptar" id="btnSA_1" type="submit" class="btn btn-primary btn-block">Registrar</button>

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
        	swal("Listo", "Producto agregado", {
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