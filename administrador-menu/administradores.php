
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

require_once '../Control/usuario/usuario_model.php';
require_once '../Control/usuario/entidad_usuario.php';


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
            header('Location: administradores.php');  
        
          


  
            
  
       
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

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
<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tipos de Turismo
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
    <div class="sidebar" data-color="blue">
          <div class="logo">
        
        <a class="simple-text logo-normal">
          Control de Administradores
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li ><a href='ajustes.php'><i class='now-ui-icons business_badge'></i><p>Datos generales</p></a></li>  

          <li >
            <a href="super_admin.php">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Registrar Administradores</p>
            </a>
          </li>

          <li >
            <a href="administradores.php">
              <i class="now-ui-icons files_paper"></i>
              <p>Registrar Usuarios</p>
            </a>
          </li>
          
         
          
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
            <a class="navbar-brand" >Super Administrador</a>
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
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Acciones</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  
                  <a class="dropdown-item" href="cerrar_sesion.php">Cerrar Sesión</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registrar Usuarios</h4>
                  <form id="login" action="?action=<?php echo $des->id_usario > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_usario" value="" />
                                     
                                                           
                                    <div class="form-group">
                                       <div class="multiselect">
                                          
                                              <input type="button" class="btn" onclick="showCheckboxes()" value="¿Deseas convertirte en colaborador?  ">
                                             
                                           
                                           <div id="checkboxes" style="display:none;" >
                                           <p>Seleccione un rol/roles</p>
                                           <label for="one"><input type="checkbox" id="one" class="roles_checkboxes" value="4"/>Autor</label><br>
                                          <label for="two"><input type="checkbox" id="two" class="roles_checkboxes" value="5"/>Proveedores</label><br>
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
                                            <input type="text" name="appat_usuario" required="" value="<?php echo $des->__GET('appat_usuario'); ?>"  class="form-control" placeholder="Ingresa Apellido Paterno">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" name="apmat_usuario" required="" value="<?php echo $des->__GET('apmat_usuario'); ?>"  class="form-control" placeholder="Ingresa Apellido Materno">
                                        </div>
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input type="number" name="edad_usuario" required="" value=""  class="form-control" placeholder="Ingresa edad">
                                        </div>
                                        <div class="form-group">
                                            <label>Correo </label>
                                            <input type="text" name="correo_usuario" required="" value="<?php echo $des->__GET('correo_usuario'); ?>"  class="form-control" placeholder="Ingresa Correo electronico">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="contrasena" required="" value="<?php echo $des->__GET('contrasena'); ?>"  class="form-control" placeholder="Ingresa Contraseña">
                                        </div>                    


                                        <div class="row form-group">
                                    <div class="col-md-12">
                                        <input id="btnSA_2"  type="submit" class="btn btn-success btn-block" value="Aceptar">


                                    </div>
                                
                            </form>
                            </div>
              
              </div>
            </div>
            
          </div>
        </div>
  
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>,  <a target="_blank">Super Administrador</a>. .
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
  <script src="assets/js/vendor/jquery-3.6.0.slim.min"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });

  </script>

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
		$("[id^='btnSA_2']").click(function (){
        	swal("Listo", "Usuario agregado", {
				  icon: "success"
				});
        	
          
    	});

	</script> 

</body>

</html>