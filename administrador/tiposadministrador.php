<?php


//$mysqli = new mysqli('localhost', 'u205223607_ttt', 'Gp0Empr3sarialV4lv1d#101#', 'u205223607_ttt');
$mysqli = new mysqli("localhost","root","","u205223607_ttt");

require_once '../Control/tiposadministrador/administradores_model.php';
require_once '../Control/tiposadministrador/administradores_tipos.php';


$des = new Turismo();
$model = new TurismoModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $des->__SET('id_usario', $_REQUEST['id_usario']);
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);


            $model->Actualizar($des);
            header('Location: tiposadministrador.php#pricing');
            break;

        case 'registrar':
            $des->__SET('id_usario', $_REQUEST['id_usario']);
            $des->__SET('usuario', $_REQUEST['usuario']);
            $des->__SET('appat_usuario', $_REQUEST['appat_usuario']);
            $des->__SET('apmat_usuario', $_REQUEST['apmat_usuario']);
            $des->__SET('correo_usuario', $_REQUEST['correo_usuario']);
            $des->__SET('contrasena', $_REQUEST['contrasena']);
            $des->__SET('id_rol', $_REQUEST['id_rol']);
                        
            $model->Registrar($des);
          print "<script language='JavaScript'>
    	alert('Datos Registrados Exitosamente' );  
	window.location.href='tiposadministrador.php'; 
	</script>";

            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_usario']);
           print "<script language='JavaScript'>
    	alert('Datos Eliminados Exitosamente' );  
	window.location.href='tiposadministrador.php'; 
	</script>";;
            break;

        case 'editar':
            $des = $model->Obtener($_REQUEST['id_usario']);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
        session_start();

        if (isset($_SESSION['usuario'])) {
            
        } else {
            header("Location:../index.php");
        }
        ?>
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
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        
        <a class="simple-text logo-normal">
          Control de administrador
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
                 
        
          <li class="active ">
            <a href="tiposadministrador.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Registrar Administradores</p>
            </a>
          </li>
          
          
          <li>
           <a href="cerrar_sesion.php">
              <i class="now-ui-icons users_single-02"> </i>
                <p>Cerrar sesión</p>
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
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registrar Administradores </h4>
                  <form id="login" action="?action=<?php echo $des->id_turismo > 0 ? 'actualizar' : 'registrar'; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_usario" value="<?php echo $des->__GET('id_usario'); ?>" />
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="usuario" required="" value="<?php echo $des->__GET('usuario'); ?>"  class="form-control" placeholder="Ingresa Nombre del Administrador">
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
                                            <label>Correo </label>
                                            <input type="text" name="correo_usuario" required="" value="<?php echo $des->__GET('correo_usuario'); ?>"  class="form-control" placeholder="Ingresa Correo electronico">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="contrasena" required="" value="<?php echo $des->__GET('contrasena'); ?>"  class="form-control" placeholder="Ingresa Contraseña">
                                        </div>

                                        <div class="form-group">
                                            <label>Rol</label>
                                            <input type="text" name="id_rol" required="" value="<?php echo $des->__GET('id_rol'); ?>"  class="form-control" placeholder="Ingresa Rol">
                                        </div>
                                        
                                        <div class="row form-group">
                                    <div class="col-md-12">
                                        <input id=""  type="submit" class="btn btn-success btn-block" value="Aceptar">


                                    </div>
                                </div>
                            </form>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    
                      <thead class=" text-primary">
                                       <tr>
                                            <th>Nombre</th>
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>correo</th>                                   
                                            <th>Rol</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($model->Listar() as $r): ?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->__GET('usuario'); ?></td>
                                            <td><?php echo $r->__GET('appat_usuario'); ?></td>
                                            <td><?php echo $r->__GET('apmat_usuario'); ?></td>
                                            <td><?php echo $r->__GET('correo_usuario'); ?></td>
                                            <td><?php echo $r->__GET('id_rol'); ?></td>


                                            <td class="center"><a  href="tiposadministrador.php?action=editar&id_usario=<?php echo $r->id_usario; ?>"><button class="btn btn-primary">Editar</button></a></td>
                                            <td class="center"><a href="?action=eliminar&id_usario=<?php echo $r->id_usario; ?>"><button id="" type="button" class="btn btn btn-danger">Eliminar</button></a></td>
                                            
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
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>,  <a target="_blank">Transportes Turisticos</a>. .
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>