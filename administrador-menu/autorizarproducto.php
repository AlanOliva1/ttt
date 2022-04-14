<?php
        require 'session_start.php';
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
        case 'estatus':
            $des->__SET('id_pro', $_REQUEST['id_pro']);
            $des->__SET('estatus_pro', 1);


            $model->Estatus($des);
            header('Location: autorizarproducto.php');
            break;

        

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_pro']);
            header('Location: autorizarproducto.php');
            break;

        case 'editar':
            $cit = $model->Obtener($_REQUEST['id_pro']);
            break;
    }
}

?>

<head>

  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administrador
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
    <div class="sidebar" data-color="orange">
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
      <li ><a href='ajustesadmin.php'><i class='now-ui-icons business_badge'></i><p>Datos generales</p></a></li>
    
        
        
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
            <a class="navbar-brand" >Administrador</a>
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
      <a class="dropdown-item" href="#">Sito</a>
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
                <h4 class="card-title"> Aprueba los Productos</h4>
                  
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    
                     
                      <thead class=" text-primary">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Imagen</th>
                                            <th>Descripcion</th>
                                            <th>Publicar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($model->Aprobar() as $r): ?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->__GET('nombre_pro'); ?></td>
                                            <td><?php echo $r->__GET('marca_pro'); ?></td>
                                            <td><?php echo $r->__GET('modelo_pro'); ?></td>
                                            <td><?php echo ' <img src="'.$r->__GET('img1_pro').'" width=100px height=100px> '; ?></td>
                                            <td><?php echo $r->__GET('descripcion_pro'); ?></td>
                                            
                                            <td class="center"><a  href="autorizarproducto.php?action=estatus&id_pro=<?php echo $r->id_pro; ?>"><button id="btnSA_1" class="btn btn-success">Aprobar</button></a></td>
            
                                            <td class="center"><button value="<?php echo $r->id_pro; ?>" id="btnSA_3<?php echo $r->id_pro; ?>" type="button" class="btn btn btn-danger btnSA_3">Denegar</button></td> 
                                        </tr>
                                        
                                    </tbody>
                                    <?php endforeach; ?>
                  </table>
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
	  
	
      
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>,  <a target="_blank">Administrador</a>. .
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
  <script>
  
  //Sweet Alert		

  $("[id^='btnSA_1']").click(function (){
      swal("Listo", "Producto aprovado", {
            icon: "success"
          });
      
    
  });
// Aqui le estoy indicando a JQUERY que cuando haga click en un boton con un id que comience con btnSA_3 (que es el id que tiene el boton)
// pues va a mostrar la alerta
$("[id^='btnSA_3']").click(function (e){
  // console.log(e.target.value);
  // console.log('Seleccionando un boton');
  // let prodId = document.querySelector('.btnSA_3');
  // console.log('Seleccionando el botón'+prodId);
  // console.log(prodId.value);

      swal({
        title: "¿Está seguro?",
        text: "Que quieres denegar el producto!",
        text: "Se eliminara",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("El producto ha sido denegado!", {
  
            icon: "success",
          });

  // e es el evento que se desencadena cuando haces click en el boton indicado con el id, este me trae información que necesitamos
  // como por ejemplo que boton se le hizo click, que evento se desencadeno etc. etc. etc.

  // target me sirve para poder recuperar el valor que tiene el boton seleccionado

  // Aqui se redirecciona a la página concatenando el valor del boton     ↓ (que en realidad es el id del producto)
  window.location.href='autorizarproducto.php?action=eliminar&id_pro=' + e.target.value;
        } else {
          swal("Operación cancelada!");
        }
});	
  });

</script>  
</body>

</html>