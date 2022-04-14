<?php

//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost","root","","u205223607_ttt");
require_once '../Control/destino/destino_model.php';
require_once '../Control/destino/entidad_destino.php';


$des = new Destino();
$model = new DestinoModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $des->__SET('id_destino', $_REQUEST['id_destino']);
            $des->__SET('nom_destinos', $_REQUEST['nom_destinos']);
            $des->__SET('id_estado', $_REQUEST['id_estado']);
            $des->__SET('ubicacion_geografica', $_REQUEST['ubicacion_geografica']);
            $des->__SET('referencias', $_REQUEST['referencias']);
            $des->__SET('img_destinos', $_REQUEST['img_destinos']);
            $des->__SET('status', $_REQUEST['status']);



            $model->Actualizar($des);
            header('Location: destinos.php#pricing');
            break;

        case 'registrar':
            $des->__SET('id_destino', $_REQUEST['id_destino']);
            $des->__SET('nom_destinos', $_REQUEST['nom_destinos']);
            $des->__SET('id_estado', $_REQUEST['id_estado']);
            $des->__SET('ubicacion_geografica', $_REQUEST['ubicacion_geografica']);
            $des->__SET('referencias', $_REQUEST['referencias']);
            $img_destinos='';
            
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
                    $img_destinos="../fotoses/".$nombre;
                }
            }
            $des->__SET('img_destinos', $img_destinos);
            $des->__SET('status', 0);
            $model->Registrar($des);
            print"<script language='JavaScript'>alert('El producto fue registrado satisfactoriamente');</script>";
            header('Location: destinos.php#pricing');

            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_destino']);
            header('Location: destinos.php#faq');
            break;

        case 'editar':
            $des = $model->Obtener($_REQUEST['id_destino']);
            break;
    }
}
?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Destinos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.ico">
		<!-- CSS here -->
   <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../assets/css/slicknav.css">
            <link rel="stylesheet" href="../assets/css/flaticon.css">
            <link rel="stylesheet" href="../assets/css/price_rangs.css">
            <link rel="stylesheet" href="../assets/css/animate.min.css">
            <link rel="stylesheet" href="../assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../assets/css/themify-icons.css">
            <link rel="stylesheet" href="../assets/css/slick.css">
            <link rel="stylesheet" href="../assets/css/nice-select.css">
            <link rel="stylesheet" href="../assets/css/style.css">
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../assets/img/logo/loder.jpg" alt="">
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
                                  <a href="destino.php"><img src="../assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                                                                                  
                                            <li><a href="destino.php">Inicio</a></li>
                                            <li><a href="tiposdestinos.php">tipos de Turismo</a></li>
                                            <li><a href="catalogo.php">Productos</a></li>
                                            <li><a href="tiendas.php">Tiendas</a></li>
                                            <li><a href="transportes.php">Transportes</a></li>
                                            <li><a href="transportistas.php">Transportistas</a></li>
                                            <li><a href="../index.php">Cerrar Sesión</a></li>
                                            
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
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header "><center class="title">Registra un Destino</center></div>
                            <form id="login" action="?action=<?php echo $des->id_destino > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_destino" value="<?php echo $des->__GET('id_destino'); ?>" />

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Nombre Destino</label>
                                        <input type="text" name="nom_destinos"   value="<?php echo $des->__GET('nom_destinos'); ?>"  class="form-control" placeholder="Ingresa nombre del Destino">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Estado</label>
                                        <br>
                                        <select class="form-control" name="id_estado">
                                    <option class="form-control" value="0">Seleccione un Estado</option>
                                                                                <?php
                                    $query = $mysqli->query("SELECT * FROM estados order by nombre_edo");
                                    while ($es = mysqli_fetch_array($query)) {
                                        echo '<option  class="form-control" value=" '.$es['id_estado'].' "> '.$es['nombre_edo'].' </option>';
                                    }
                                    ?> 

                                </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Ubicación</label>
                                        <input type="text" name="ubicacion_geografica"  value="<?php echo $des->__GET('ubicacion_geografica'); ?>"  class="form-control" placeholder="Ingresa la ubicacion">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="date-start">Referencias</label>
                                        <input type="text" name="referencias"  value="<?php echo $des->__GET('referencias'); ?>"  class="form-control" placeholder="Ingresa la descripcion">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="file-start">Imagen</label>
                                        <input type="file" name="foto" class="form-control" >
                                    </div>
                                </div>
                                


                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Aceptar">


                                    </div>
                                </div>
                            </form> 
                         </div>
                
        </div>
        </div>
    </div>
        <!-- Hero Start-->
        <div class="hero-area3 hero-overly2 d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-cap text-center pt-50 pb-20">
                            <h2>Explora Todos Los Destinos<a   data-target="#miModal" href=## data-toggle="modal" data-target="#miModal"><button class="btn btn btn-success ti-plus" >Agregar Destino</button></a></h2>
                        </div>
                        <!--Hero form -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!--Hero End -->
          <!-- Popular Locations Start -->
        <div class="popular-location section-padding20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Es momento de conocer</span>
                            <h2>Destinos  <a   data-target="#miModal" href=## data-toggle="modal" data-target="#miModal"><button class="btn btn btn-success ti-plus" >Agregar Destino</button></a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $nombre=$_GET['id'];?>
                <?php foreach ($model->ListarDes($nombre) as $r): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                <?php echo '<img src="'.$r->__GET('img_destinos').'" width=300px height=300px> '; ?>
                            </div>
                            <div class="location-details">
                                <p><?php echo $r->__GET('nom_destinos'); ?></p>
                                <a href="detalles_destino.php?id=<?php echo $r->__GET('id_destino'); ?>" class="location-btn">Ver detalles</a>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
        <!-- Popular Locations End -->

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
         <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="../assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/slick.min.js"></script>
        <!-- One Page, Animated-HeadLin -->
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/animated.headline.js"></script>
        <script src="../assets/js/jquery.magnific-popup.js"></script>

        <!-- Nice-select, sticky -->
        <script src="../assets/js/jquery.nice-select.min.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="../assets/js/contact.js"></script>
        <script src="../assets/js/jquery.form.js"></script>
        <script src="../assets/js/jquery.validate.min.js"></script>
        <script src="../assets/js/mail-script.js"></script>
        <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
        
        <!-- Jquery Plugins, main Jquery -->    
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
        
    </body>
</html>