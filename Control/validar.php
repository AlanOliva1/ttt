<?php
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

//$conexion=mysqli_connect("localhost","u205223607_ttt", "Gp0Empr3sarialV4lv1d#101#", "u205223607_ttt");//
$conexion=mysqli_connect("localhost","root","","u205223607_ttt");

$consulta="SELECT*FROM usuario where usuario='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==1){ //administrador
    
    header("location:../administrador/estados.php");

}else
if($filas['id_rol']==2){ //cliente
header("location:../usuario/destino.php");
}else
if($filas['id_rol']==3){ //cliente
header("location:Vista/transportista/transportista.php");
}
else{
     print "<script language='JavaScript'>
    	alert('Datos Incorrectos, intenta de nuevo' );  
	window.location.href='../index.php'; 
	</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>