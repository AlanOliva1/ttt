    
<?php

$userid =$_SESSION['usuario_id'];
$conexion=$mysqli = new mysqli('localhost', 'root', '', 'u205223607_ttt');
//$conexion=mysqli_connect("localhost","u205223607_ttt","Gp0Empr3sarialV4lv1d","u205223607_ttt");

$consulta="SELECT * FROM rol_usuario WHERE id_usario = '$userid'";

$resultado=mysqli_query($conexion,$consulta);



if ($resultado) {
    while($row = mysqli_fetch_array($resultado)) {
      
      if ($row['id_permiso'] == 1) {
    //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
        
        print "<li><a href='listaproveedor.php'><i class='now-ui-icons shopping_delivery-fast'></i><p>Lista  proveedor</p></a></li>";
        
      }
      
      if($row['id_permiso'] == 2) {
        //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
          
            print "<li><a href='listatransporte.php'><i class='now-ui-icons files_single-copy-04'></i><p>Lista Transportista</p></a></li>";
            
        }


        if($row['id_permiso'] ==3 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
           
            print"<li ><a href='listautores.php'><i class='now-ui-icons shopping_bag-16'></i><p>Lista Autores</p></a></li>";
      
          
        }
        if($row['id_permiso'] ==4 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='listaproducto.php'><i class='now-ui-icons shopping_bag-16'></i><p>Lista Producto</p></a></li>";

          
        }
        if($row['id_permiso'] ==5) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='listadestino.php'><i class='now-ui-icons shopping_bag-16'></i><p>Lista Destino</p></a></li>";
    
          
        }
        if($row['id_permiso'] ==6 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='listatrasporte.php'><i class='now-ui-icons shopping_bag-16'></i><p>Lista Transportes</p></a></li>";
   
          
        }
        if($row['id_permiso'] ==7 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='autorizardestino.php'><i class='now-ui-icons shopping_bag-16'></i><p>Autorizar Destino</p></a></li>";
            
          
        }
        if($row['id_permiso'] ==8 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='autorizartrasporte.php'><i class='now-ui-icons shopping_bag-16'></i><p>Autorizar Transporte</p></a></li>";
            
          
        }
        if($row['id_permiso'] ==9 ) {
            //PINTAR TODOS LOS LINK CORRESPONDIENTES AL PERMISO
            
            print"<li ><a href='autorizarproducto.php'><i class='now-ui-icons shopping_bag-16'></i><p>Autorizar  Productos</p></a></li>";
            
        }
    }
}
?>