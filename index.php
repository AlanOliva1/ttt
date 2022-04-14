<?php

//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost","root","","u205223607_ttt");
require_once 'Control/usuario/usuario_model.php';
require_once 'Control/usuario/entidad_usuario.php';


$des = new Usuario();
$model = new UsuarioModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        
        case 'registrar':
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('nombre_usuario', $_REQUEST['nombre_usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('edad_usuario', $_REQUEST['edad_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);
           
            $model->Registrar($des);
           print "<script language='JavaScript'>
    	alert('Datos Agregados Exitosamente, Inicie Sesión' );  
	window.location.href='index.php'; 
	</script>";

            

       
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
            <link rel="stylesheet" href="assets/css/argos.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<script type="text/javascript">
    var expanded = false;
    function showCheckboxes() {
      var checkboxes = document.getElementById("checkboxes");
      if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
      getRolesValue();
    }

    function getRolesValue() {
        var rolesSelected = "";
        var container = document.getElementsByClassName("roles_checkboxes");
        for(var i=0; container[i]; ++i){
              if(container[i].checked){
                   rolesSelected = container[i].value + "," + rolesSelected ;
              }
        }
        $(container).change(function(){
            getRolesValue();
        });
        document.getElementById("id_rol").value=rolesSelected;
    }
</script>

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
       <div class="header-area header-transparent">
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
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.php">Inicio</a></li>
                                            <li><a href="destino.php">Destinos</a></li>
                                            <li><a href="catalogo.php">Productos</a></li>
                                            <li><a href="transportes.php">Transportes</a></li>
                                            <li class="login"><a  href=## data-toggle="modal" data-target="#miModal1">
                                                <i class="ti-user"></i> Registrar</a>
                                            </li>
                                            <li class="login"><a  href=## data-toggle="modal" data-target="#miModal">
                                                <i class="ti-user"></i> Iniciar Sesión</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    
    
    <main>

        <!-- Hero Area Start-->
        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="validar.php" method="post">
            
<div class="card-header "><center class="title">Iniciar Sesión</center></div>
                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Usuario</label>
                                        <input type="text" name="usuario"   class="form-control" placeholder="Ingresa tu nombre de Usuario">
                                    </div>
                                </div>
                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Contraseña</label>
                                        <input type="password" name="contrasena"   class="form-control" placeholder="Ingresa tu contraseña">
                                    </div>
                                </div>

<div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Ingresar">


                                    </div>
                                </div>



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
            <div class="modal-body">
                <div class="card-header "><center class="title">Registrate</center></div>
                            <form id="login" action="?action=registrar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_usuario" value="" />
                                       
                                    <div class="form-group">
                                        <label for="date-start">Deseas convertirte en colaborador? </label>


                                    <div class="multiselect">
                                        <div class="selectBox" onclick="showCheckboxes()">
                                          <select class="selectBox-class">
                                            <option>Seleccione un Rol</option>
                                          </select>
                                          <div class="overSelect"></div>
                                        </div>
                                        <div id="checkboxes">
                                          <label for="one"><input type="checkbox" id="one" class="roles_checkboxes" value="4"/>Autor</label>
                                          <label for="two"><input type="checkbox" id="two" class="roles_checkboxes" value="5"/>Proveedores</label>
                                          <label for="three"><input type="checkbox" id="three" class="roles_checkboxes" value="3"/>Transportista</label>
                                        </div>
                                        
                                    </div>

                                    <input type="hidden" name="id_rol" id="id_rol"/>




                                    </div>
                                       
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="usuario" required="" value=""  class="form-control" placeholder="Ingresa tu nombre de usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombre_usuario" required="" value=""  class="form-control" placeholder="Ingresa Apellido Paterno">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" name="appat_usuario" required="" value=""  class="form-control" placeholder="Ingresa Apellido Paterno">
                                        </div>
                                        <div class="form-group">
                                            <label>Apelldio Materno</label>
                                            <input type="text" name="apmat_usuario" required="" value=""  class="form-control" placeholder="Ingresa Apellido Materno">
                                        </div>
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input type="number" name="edad_usuario" required="" value=""  class="form-control" placeholder="Ingresa edad">
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" name="correo_usuario" required="" value=""  class="form-control" >
                                        </div>
                                            <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="contrasena" required="" value=""  class="form-control" >
                                        </div>
                                           
                                        
                    
                                       <button type="submit" class="btn btn-primary btn-block" style="background: #1068AB" id="" value="Aceptar">Registrar</button>
                                        
                                       
                                                        
                                        

                                 
                            </form> 
                         </div>
                
        </div>
        </div>
    </div>
        
       



         <div class="hero-area3 hero-overly2 d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-cap text-center pt-50 pb-20">
                            <h2>Tu eliges tu Destino</h2>
                        </div>
                        <!--Hero form -->
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/banner/1.jpg"  alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/banner/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/banner/3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Locations Start -->
        <div class="popular-location section-padding20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Sugerencias para ti</span>
                            <h2>DESTINOS POR TIPO</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                   <?php
                                    $query = $mysqli->query("SELECT *

FROM tipos_turismos ");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img_turismo'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nombre_turismo'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                </div>
                <!-- More Btn 
                <div class="row justify-content-center">
                    <div class="room-btn pt-20">
                        <a href="catagori.html" class="btn view-btn1">View All Places</a>
                    </div>
                </div>
                -->
            </div>
        </div>
        <!-- Popular Locations End -->
        <!-- Services Area Start -->
        <div class="services-area pt-150 pb-150 section-bg" data-background="assets/img/gallery/section_bg02.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 text-center mb-80">
                            <span>Facil de Explorar</span>
                            <h2>Cómo funciona</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-list"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a >1. Elige un Estado</h5>
                                <p>Explora el estdo de la republica que deseas visitar</p>
                            </div>
                            <!-- Shpape -->
                            <img class="shape1 d-none d-lg-block" src="assets/img/icon/serices1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-problem"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a >2. Selecciona un destio</a></h5>
                                <p>Visualiza los destido que se muestran segun el estado seleccionado.</p>
                            </div>
                            <img class="shape2 d-none d-lg-block" src="assets/img/icon/serices2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services text-center mb-50">
                            <div class="services-icon">
                                <span class="flaticon-respect"></span>
                            </div>
                            <div class="services-cap">
                                <h5><a >3. Planea tu aventura</a></h5>
                                <p>Puedes encontrar infromacion de algunos transportistas que te llevaran a tu destino</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Subscribe Area End -->
        <!-- Blog Ara Start -->
       
        
<!-- Destionos populares-->
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>TRANSPORTES TURISTICOS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                                    $query = $mysqli->query("SELECT *

FROM trasnportespopulares tp 
JOIN transportes AS t 
ON t.id_transporte = tp.id_transporte
JOIN estados AS e 
ON e.id_estado = t.id_estado 
JOIN tipotransporte AS tt
ON t.id_tipot = tt.id_tipot  ");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img_transporte'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nom_transporte'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                    
                </div>
            </div>
        </div>
        <!-- Destionos populares-->
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>DESTINOS MÁS POPULARES</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                                    $query = $mysqli->query("SELECT *

FROM destinospopulares AS dp

JOIN destinos AS d 
ON d.id_destino = dp.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado   ");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img_destinos'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nom_destinos'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                    
                </div>
            </div>
        </div>
        
        <!-- Destionos menos concurridos-->
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>DESTINOS MENOS CONCURRIDOS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                                    $query = $mysqli->query("SELECT *

FROM destinosnoconcurridos AS dn

JOIN destinos AS d 
ON d.id_destino = dn.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado  ");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img_destinos'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nom_destinos'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                </div>
            </div>
        </div>
        
        <!-- Destionos mas recomendados-->
        <div class="popular-location section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>DESTINOS MÁS RECOMENDADOS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                                    $query = $mysqli->query("SELECT *

FROM destinosrecomendados AS dr

JOIN destinos AS d 
ON d.id_destino = dr.id_destino 
JOIN estados AS e 
ON e.id_estado = d.id_estado ");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img_destinos'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nom_destinos'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                </div>
            </div>
        </div>
        
        
         <!-- productos y servicios destacados-->
        <div class="home-blog-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        


        
                        <div class="section-tittle text-center mb-70">
                            <span>Estar preparado es la mejor opción</span>
                            <h2>PRODUCTOS Y SERVICIOS DESTACADOS</h2>
                        </div> 
                    </div>
                </div>

                <div class="row">
                     <?php
                                    $query = $mysqli->query("SELECT *

FROM productosdestacados AS pd

JOIN productos AS p
ON p.id_pro = pd.id_pro");
                                    while ($des = mysqli_fetch_array($query)) {
                                        
                                       echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <img src="'.$des['img1_pro'].' " width=300px height=auto>
                            </div>
                            <div class="location-details">
                                <p> '.$des['nombre_pro'].'</p>
                                
                            </div>
                        </div>
                    </div>'
                                      
                                    ;}
                                    ?> 
                </div>
            </div>
        </div>
        
        
        
        <!-- Blog Ara End -->

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area">
            <div class="container">
               <div class="footer-top footer-padding">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>CATEGORÍAS</h4>
                                    <ul>
                                        <li><a href="#">Agencia de Viaje</a></li>
                                        <li><a href="#">Transportes Turisticos</a></li>
                                        <li><a href="#">Turismo Religioso</a></li>
                                        <li><a href="#">Turismo de Playa</a></li>
                                        <li><a href="#">Turismo Recreativo</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <ul>
                                        <li><a href="#">Turismo de Aventura</a></li>
                                        <li><a href="#">Turismo de Negocios</a></li>
                                        <li><a href="#">Turismo Cultural</a></li>
                                        <li><a href="#">Pueblos Magicos</a></li>     
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Links</h4>
                                    <ul>
                                        <li><a href="#">Inicio</a></li>
                                        <li><a href="#">Contacto</a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos resergvados 
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
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