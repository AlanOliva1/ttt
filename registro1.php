<?php

//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost","root","","u205223607_ttt");
require_once 'Control/usuarios/usuario_model.php';
require_once 'Control/usuarios/entidad_usuario.php';


$des = new Usuario();
$model = new UsuarioModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);


            $model->Actualizar($des);
            header('Location: index.php');
            break;

        case 'registrar':
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);
           
            $model->Registrar($des);
           print "<script language='JavaScript'>
    	alert('Datos Agregados Exitosamente, Inicie Sesión' );  
	window.location.href='index.php'; 
	</script>";

            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_usuario']);
           print "<script language='JavaScript'>
    	alert('Datos Eliminados Exitosamente' );  
	window.location.href='usuario.php'; 
	</script>";;

        case 'editar':
            $cdes = $model->Obtener($_REQUEST['id_usuario']);
            break;
    }
}
?>

    
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registro de Usuario </title>
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
    <header>
        <!-- Header Start -->
       
            <div class="main-header">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                  <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-8">
                                <!-- Main-menu -->
                              
                            <!-- Mobile Menu -->
                            
                        </div>
                    </div>
               </div>
            </div>
      
        <!-- Header End -->
    </header>
    
    
    <main>

        <!-- Hero Area Start-->
        






</form> 
                </div>
                
        </div>
        </div>
    </div>
    <div class="modal fade" id="miModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                    
                
        </div>
        </div>
    </div>
        
  
         
       
        <div class="popular-location section-padding20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>Registro Usuario</h2>
                        </div>
                    </div>
                </div>
                                                
                                       
                            <form id="login" action="?action=<?php echo $des->id_usuario > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label for="date-start">Deseas convertirte en colaborador? </label>
                                        <select class="form-control" name="id_rol">
                                    <option class="form-control" value="0">Elije el usuario que deseas elegir  </option>
                                  
                                            </div>
                                    <?php
                                            $mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
                                            //$mysqli = new mysqli("localhost","root","12345678","argos21");
                                            $query = $mysqli->query("SELECT * FROM rol where id_rol >= 3 order by nom_rol");
                                    while ($es = mysqli_fetch_array($query)) {
                                        echo '<option  value=" '.$es['id_rol'].' "> '.$es['nom_rol'].' </option>';
                                    }
                                    ?> 
                                        
                                        </div>
                                       

                                       
                                <input type="hidden" name="id_usuario" value="<?php echo $des->__GET('id_usuario'); ?>" />
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="usuario" required="" value="<?php echo $des->__GET('usuario'); ?>"  class="form-control" placeholder="Ingresa tu nombre de usuario">
                                        </div>
                                            <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" name="appat_usuario" required="" value="<?php echo $des->__GET('appat_usuario'); ?>"  class="form-control" placeholder="Ingresa Apellido Paterno">
                                        </div>
                                            <div class="form-group">
                                            <label>Apelldio Materno</label>
                                            <input type="text" name="apmat_usuario" required="" value="<?php echo $des->__GET('apmat_usuario'); ?>"  class="form-control" placeholder="Ingresa Apellido Materno">
                                        </div>
                                            <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" name="correo_usuario" required="" value="<?php echo $des->__GET('correo_usuario'); ?>"  class="form-control" placeholder="Ingresa Correo">
                                        </div>
                                            <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="contrasena" required="" value="<?php echo $des->__GET('contrasena'); ?>"  class="form-control" placeholder="Ingresa Contraseña">
                                        </div>

                                       
                                            
                                    
                                        <div class="row form-group">
                                    <div class="col-md-12">
                                        <input id=""  type="submit" class="btn btn-primary btn-block" style="background: #1068AB" value="Aceptar">


                                    </div>
                                    </div>


                                    

                             
                                    </div>
                                        
                    </form>
                                                                              
                                       
                                                        
                                        

                                   
                            
                         </div>
                </div>
               
            </div>
        </div>
        






    
        <!-- Footer End-->
    
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