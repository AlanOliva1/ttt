<?php
require_once '../Control/destino/destino_model.php';
require_once '../Control/destino/entidad_destino.php';


$des = new Destino();
$model = new DestinoModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'estatus':
            $des->__SET('id_destino', $_REQUEST['id_destino']);
            $des->__SET('status', 1);


            $model->Estatus($des);
            header('Location: destinos.php#pricing');
            break;

        

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_destino']);
            header('Location: destinos.php#faq');
            break;

        case 'editar':
            $cit = $model->Obtener($_REQUEST['id_destino']);
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
    Aprobar Destinos
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
          Transportes Turisticos
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          
          <li>
            <a  href="Estados.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Estados</p>
            </a>
          </li>
            <li >
            <a href="productos.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Aprobar Productos</p>
            </a>
          </li>
            <li class="active ">
            <a href="destinos.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Aprobar Destinos</p>
            </a>
          </li>
          <li>
            <a href="tipos.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Tipos Turismos</p>
            </a>
          </li>
          
          <li >
            <a href="DestinosPopulares.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Destinos Populares</p>
            </a>
          </li>
        
            <li>
            <a href="DestinosnoConcurridos.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Destinos no Concurridos</p>
            </a>
          </li>
            <li>
            <a href="DestinosRecomendados.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Destinos Recomendados</p>
            </a>
          </li>
            <li>
            <a href="tipotransporte.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Tipos Transportes</p>
            </a>
          </li>
            <li>
            <a href="transportespopulares.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Transportes Populares</p>
            </a>
          </li>
            <li>
            <a href="productosdestacados.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Productos Populares</p>
            </a>
            </li>
                  
                <li >
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
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Acciones</span>
                  </p>
                  
                </a>
                            
                  
                
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
                <h4 class="card-title"> Aprueba Los Destinos</h4>
                  
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    
                     
                      <thead class=" text-primary">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Ubicación Geografica</th>
                                            <th>Referencias</th>
                                            <th>Imagen</th>
                                            <th>Publicar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($model->Aprobar() as $r): ?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $r->__GET('nom_destinos'); ?></td>
                                            <td><?php echo $r->__GET('ubicacion_geografica'); ?></td>
                                            <td><?php echo $r->__GET('referencias'); ?></td>
                                            <td><?php echo ' <img src="'.$r->__GET('img_destinos').'" width=100px height=100px> '; ?></td>
                                            <td class="center"><a  href="destinos.php?action=estatus&id_destino=<?php echo $r->id_destino; ?>"><button class="btn btn-success">Aprobar</button></a></td>
                                            <td class="center"><a href="destinos.php?action=eliminar&id_destino=<?php echo $r->id_destino; ?>"><button id="btnSA_3" ty
                                            pe="button" class="btn btn btn-danger">Denegar</button></a></td>
                                            
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