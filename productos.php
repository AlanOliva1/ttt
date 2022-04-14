<?php
require_once 'Control/producto/producto_model.php';
require_once 'Control/producto/entidad_producto.php';


$des = new Producto();
$model = new ProductoModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $des->__SET('id_pro', $_REQUEST['id_pro']);
            $des->__SET('nombre_pro', $_REQUEST['nombre_pro']);
            $des->__SET('marca_pro', $_REQUEST['marca_pro']);
            $des->__SET('modelo_pro', $_REQUEST['modelo_pro']);
            $des->__SET('categoria_pro', $_REQUEST['categoria_pro']);
            $des->__SET('condicion_pro', $_REQUEST['condicion_pro']);
            $des->__SET('img1_pro', $_REQUEST['img1_pro']);
            $des->__SET('img2_pro', $_REQUEST['img2_pro']);
            $des->__SET('img3_pro', $_REQUEST['img3_pro']);
            $des->__SET('precio_pro', $_REQUEST['precio_pro']);
            $des->__SET('garantia_pro', $_REQUEST['garantia_pro']);
            $des->__SET('descripcion_pro', $_REQUEST['descripcion_pro']);
            $des->__SET('estatus_pro', $_REQUEST['estatus_pro']);


            $model->Actualizar($des);
            header('Location: productos.php#pricing');
            break;

        case 'registrar':
            $des->__SET('id_pro', $_REQUEST['id_pro']);
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
                $carpeta = "../../fotos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img1_pro="../../fotos/".$nombre;
                }
            }
            if(isset($_FILES["foto2"])){
                $file = $_FILES["foto2"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../../fotos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                else if($size > 3*1024*1024){
                    echo "Error el tamaño maximo es de 3mb";
                }
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img2_pro="../../fotos/".$nombre;
                }
            }
            if(isset($_FILES["foto3"])){
                $file = $_FILES["foto3"];
                $nombre = $file["name"];
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones [0];
                $height = $dimensiones[1];
                $carpeta = "../../videos/";
                if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'image/JPEG'){
                    echo "error el archivo no es imagen";
                }
                
                else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $img3_pro="../../fotos/".$nombre;
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
            print"<script language='JavaScript'>alert('El producto fue registrado satisfactoriamente');</script>";
            header('Location: productos.php#pricing');

            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_pro']);
            header('Location: productos.php#faq');
            break;

        case 'editar':
            $cit = $model->Obtener($_REQUEST['id_pro']);
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
		<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/logo.ico">

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
			<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
                                            <li><a href="transportes.php">Transportes</a></li>                                        <li class="login"><a  href=## data-toggle="modal" data-target="#miModal">
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
    
    <section id="modal">
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="Control/validar.php" method="post">

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
        </section>
    <main>

        <!-- Hero Area Start-->




         <div class="hero-area3 hero-overly2 d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-cap text-center pt-50 pb-20">
                            <h2>Tu eliges tus Productos</h2>
                        </div>
                        <!--Hero form -->
                        
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
                            <h2>Tus productos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">


                   <?php foreach ($model->Listar() as $r): ?>

                        <br>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                
                               <?php echo ' <img src="'.$r->__GET('img1_pro').'" width=300px height=300px> '; ?>
                            </div>
                            <div class="location-details">
                                <p><?php echo $r->__GET('nombre_pro'); ?></p>
                                

                                 <center><a  data-toggle="modal" data-target="#miModal" href="#miModal?action=editar&id_pro=<?php echo $r->id_pro; ?>"><button class="location-btn">Editar</button></a></center>
                                    <center><a href="?action=eliminar&id_pro=<?php echo $r->id_pro; ?>"><button class="location-btn">Eliminar</button></a></center>


                               



                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
       
        
        
         <!-- productos y servicios destacados-->
      
        
        
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