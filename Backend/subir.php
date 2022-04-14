<?php
include('conexion.php');

if(isset($_POST['Guardar'])){
  $nombre = $_POST['titulo'];
  $nombre = $_POST['titulo'];
    $imagen = $_FILES['imagen']['name'];
    

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp';
          $_SESSION['tipo'] = 'danger';
          header('location:../prueba.php');
       }else{
         $query = "INSERT INTO tipo_trasporte(nombre,imagen) values('$nombre','$imagen')";
         $resultado = mysqli_query($conn,$query);
         if($resultado){
              move_uploaded_file($temp,'tipo_transporte/'.$imagen);   
             $_SESSION['mensaje'] = 'se ha subido correctamente';
             $_SESSION['tipo'] = 'success';
             header('location:../prueba.php');
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
       }
    }
}


?>