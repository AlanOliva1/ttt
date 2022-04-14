<?php

$mysqli = new mysqli('localhost', 'root', '', 'u205223607_ttt');

//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');

require_once 'Control/usuario/usuario_model.php';
require_once 'Control/usuario/entidad_usuario.php';


$des = new Usuario();
$model = new UsuarioModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
             $des->__SET('id_usuario', $_REQUEST['id_usuario']);
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);
            print "<script language='JavaScript'>
    	alert('Datos Registrados Exitosamente, Inicie Sesión' );  
	window.location.href='index.php'; 
	</script>";
            break;

            $model->Actualizar($des);
            header('Location: destinos.php#pricing');
            break;

        case 'registrar':
             $des->__SET('id_usuario', $_REQUEST['id_usuario']);
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);
            print "<script language='JavaScript'>
    	alert('Datos Registrados Exitosamente, Inicie Sesión' );  
	window.location.href='index.php'; 
	</script>";
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_usuario']);
            header('Location: destinos.php#faq');
            break;

        case 'editar':
            $des = $model->Obtener($_REQUEST['id_usuario']);
            break;
    }
}


?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Transportes Turisticos </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
   
      <div id="login">
         
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                       <form id="login" action="?action=<?php echo $des->id_usuario > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                           <br>
                           <h3 class="text-center text-info">Registro</h3>
                                <input type="hidden" name="id_usuario" value="<?php echo $des->__GET('id_usuario'); ?>" />

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Nombre de Usuario</label>
                                        <input type="text" name="usuario"   value="<?php echo $des->__GET('usuario'); ?>"  class="form-control" placeholder="Ingresa nombre de Usuario">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Apellido Paterno</label>
                                        <input type="text" name="appat_usuario"   value="<?php echo $des->__GET('appat_usuario'); ?>"  class="form-control" placeholder="Ingresa nombre de Usuario">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Apellido Materno</label>
                                        <input type="text" name="apmat_usuario"   value="<?php echo $des->__GET('apmat_usuario'); ?>"  class="form-control" placeholder="Ingresa nombre de Usuario">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Correo</label>
                                        <input type="text" name="correo_usuario"   value="<?php echo $des->__GET('correo_usuario'); ?>"  class="form-control" placeholder="Ingresa correo">
                                    </div>
                                </div>
                                
                                
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Contraseña</label>
                                        <input type="password" name="contrasena"  value="<?php echo $des->__GET('contrasena'); ?>"  class="form-control" placeholder="Ingresa la ubicacion">
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                        <label for="date-start">Papel que va a utilizar</label>
                                        <select class="form-control" name="id_rol">
                                    <option class="form-control" value="0">Seleccione un Rol</option>
                                                                                <?php
                                    $query = $mysqli->query("SELECT * FROM rol where id_rol >= 2 order by nom_rol");
                                    while ($es = mysqli_fetch_array($query)) {
                                        echo '<option  value=" '.$es['id_rol'].' "> '.$es['nom_rol'].' </option>';
                                    }
                                    ?> 

                                </select>
                                    </div>
                                
                                

                                <br>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Aceptar">


                                    </div>
                                </div>
                            </form> 
                        
                        <a    href=index.php ><button class="btn btn btn-danger btn-block" >Cancelar</button></a>
                    </div>
                </div>
            </div>
        </div>
    
   
               
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="assets/js/wow.min.js"></script>
		<script src="assets/js/animated.headline.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>

		<!-- Nice-select, sticky -->
        <script src="assets/js/jquery.nice-select.min.js"></script>
		<script src="assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="assets/js/contact.js"></script>
        <script src="assets/js/jquery.form.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        
    </body>
</html>