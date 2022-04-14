

<?php
require_once '../Control/producto/producto_model.php';
require_once '../Control/producto/entidad_producto.php';


$des = new Producto();
$model = new ProductoModel();


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
        <meta charset="utf-8">
		<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Transportes Turisticos </title>
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

	<link href="../assets/css/style1.css" rel="stylesheet" type="text/css" media="all" />
            <!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

   </head>

<body>
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
    </div>
    <div class="modal fade" id="miModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header "><center class="title">Registrate</center></div>
                <div id="form_tipo_suguro">
                            <div id="form_tipo_suguro">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre"  placeholder="ingresar nombre">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Apellido paterno</label>
                        <input type="text" class="form-control" id="apellidop" placeholder="ingresa apellido paterno">
                    </div>

                    <div class="form-group">
                        <label>Apellido materno</label>
                        <input type="text" class="form-control" id="apellidom"  placeholder="ingresar apellido materno">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" class="form-control" id="correo" placeholder="ingresa correo">
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="contrasena"  placeholder="ingresar contraseña">
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Confirmar contraseña</label>
                        <input type="password" class="form-control" id="contrasenac" placeholder="ingresa contraseña">
                    </div>

                    
                    
                    <button type="submit" class="btn btn-primary btn-block" style="background: #1068AB" id="registro">Registrar</button>
                </div>
                
        </div>
            </div>
        </div>
    </div>
    </div>
        <!-- Header Start -->
		<div class="hero-area3 hero-overly2 d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-cap text-center pt-50 pb-20">
                            <h2>Preparate para la aventura</h2>
                        </div>
                        <!--Hero form -->
                        
                    </div>
                </div>
            </div>
        </div>
       <div class="header-area header-transparent">
            <div class="main-header">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                  <a href="destino.php"><img src="assets/img/logo/logo.png" alt=""></a>
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

	

	
	


	<!-- top Products -->
	<div class="ads-grid  py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span></span>
				<span></span>
				<span></span>Productos</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-900">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
							<div class="row">
								

							<?php foreach ($model->Listar() as $r): ?>

								<div class="col-md-4 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											 <?php echo ' <img src="'.$r->__GET('img1_pro').'" width=300px height=300px> '; ?>
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
                                                     
													<a href="detalles_producto.php?id=<?php echo $r->__GET('id_pro'); ?>" class="link-product-add-cart">Ver detalles</a>
												</div>
											</div>
										</div>
										<span class="product-new-top">New</span>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
											<a><?php echo $r->__GET('nombre_pro'); ?><a>
											</h4>
											<div class="info-product-price my-2">
											<span class="item_price"><?php echo '$', $r->__GET('precio_pro'); ?></span>
											</div>
											<!--  <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="Sony 80 cm (32 inches)" />
														<input type="hidden" name="amount" value="320.00" />
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div> -->

										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>				
				
	<!-- //top products -->

	

	<!-- footer -->
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
	<!-- js-files -->
	<!-- jquery -->
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