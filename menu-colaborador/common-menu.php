
    
<?php

$userid =$_SESSION['usuario_id'];

$conexion=mysqli_connect("localhost","root", "", "u205223607_ttt");
//$conexion=mysqli_connect("localhost","u205223607_ttt", "Gp0Empr3sarialV4lv1d#101#", "u205223607_ttt");

$consulta="SELECT * FROM rol_usuario WHERE id_usario = '$userid'";

$resultado=mysqli_query($conexion,$consulta);



if ($resultado) {
    while($row = mysqli_fetch_array($resultado)) {
      
      if ($row['id_rol'] == 3) {
        //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
       
        print "<li><a href='agregar_transportes.php'><i class='now-ui-icons shopping_delivery-fast'></i><p>Transportes</p></a></li>";
        print "<li><a href='agregar_transportistas.php'><i class='now-ui-icons design_bullet-list-67'></i><p>Mis Transportistas</p></a></li>";
      }
      
      if($row['id_rol'] == 4) {
        //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
        print "<li><a href='agregar_cronicas.php'><i class='now-ui-icons files_single-copy-04'></i><p>Agregar Destinos</p></a></li>";
        print "<li><a href='lista_cronicas.php'><i class='now-ui-icons location_map-big'></i><p>Mis Destinos</p></a></li>";
    }


        if($row['id_rol'] == 5) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL ROL
            
            print"<li ><a href='agregar_producto.php'><i class='now-ui-icons shopping_bag-16'></i><p>Agregar Productos</p></a></li>";
            print"<li ><a href='mis_productos.php'><i class='now-ui-icons design_bullet-list-67'></i><p>Mis Productos</p></a></li>";
          
        }
    }
}

?>

