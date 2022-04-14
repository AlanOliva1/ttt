<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
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
        <li ><a href='ajustes.php'><i class='now-ui-icons business_badge'></i><p>Datos generales</p></a></li>
    
<?php

$userid =$_SESSION['usuario_id'];

$conexion=mysqli_connect("localhost","root", "", "u205223607_ttt");
//$conexion=mysqli_connect("localhost","u205223607_ttt", "Gp0Empr3sarialV4lv1d#101#", "u205223607_ttt");

$consulta="SELECT * FROM rol_usuario WHERE id_usario = '$userid'";

$resultado=mysqli_query($conexion,$consulta);



if ($resultado) {
    while($row = mysqli_fetch_array($resultado)) {
      var_dump($row);
      
      if ($row['id_rol'] == 3) {
        //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
        echo 'Menú permitido para el rol numero 3';
        print "<li><a href='agregar_transportes.php'><i class='now-ui-icons shopping_delivery-fast'></i><p>Transportes</p></a></li>";
        print "<li><a href='agregar_transportistas.php'><i class='now-ui-icons design_bullet-list-67'></i><p>Mis Transportistas</p></a></li>";
      }
      
      if($row['id_rol'] == 4) {
        //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
          echo 'Menú permitido para el rol numero 4';
          var_dump($row);

            print "<li><a href='agregar_cronicas.php'><i class='now-ui-icons files_single-copy-04'></i><p>Agregar Crónica</p></a></li>";
            print "<li><a href='lista_cronicas.php'><i class='now-ui-icons location_map-big'></i><p>Mis Crónicas</p></a></li>";
        }


        if($row['id_rol'] == 5) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
            echo 'Menú permitido para el rol numero 5';
            print"<li ><a href='agregar_producto.php'><i class='now-ui-icons shopping_bag-16'></i><p>Agregar Productos</p></a></li>";
            print"<li ><a href='mis_productos.php'><i class='now-ui-icons design_bullet-list-67'></i><p>Mis Productos</p></a></li>";
          
        }
    }
}

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
            <a class="navbar-brand" >Autor</a>
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
      <a class="dropdown-item" href="autorp.php">Sito</a>
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