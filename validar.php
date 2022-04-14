<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
session_start();



//$conexion=mysqli_connect("localhost","u205223607_ttt", "Gp0Empr3sarialV4lv1d#101#", "u205223607_ttt");//
$conexion=mysqli_connect("localhost","root","","u205223607_ttt");

$consulta="SELECT * FROM usuario as u JOIN rol_usuario as rl ON u.id_usario = rl.id_usario WHERE u.usuario = '$usuario' and contrasena = '$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

$_SESSION['usuario_id'] = $filas['id_usario'];


if($filas['id_rol']==1){ //super administrador
     print "<script language='JavaScript'>
	 alert('Bienvenido Super-Administrador' );
	 window.location.href='administrador-menu/super_admin.php'; 
	</script>";
   

}else
if($filas['id_rol']==2){ //Administrador
     print "<script language='JavaScript'>
    	alert('Bienvenido Administrador' );  
		window.location.href='administrador-menu/ajustesadmin.php';
	</script>";

}else
if($filas['id_rol']==3){ //Trasportista
     print "<script language='JavaScript'>
		alert('Bienvenido' );  
	   window.location.href='menu-colaborador/ajustes.php'; 
	   
	
	</script>";

}
else
if($filas['id_rol']==4){ //Autor
     print "<script language='JavaScript'>
	 alert('Bienvenido' ); 
	 window.location.href='menu-colaborador/ajustes.php';
	
	</script>";

}
else
if($filas['id_rol']==5){ //Proveedores
	print "<script language='JavaScript'>
	alert('Bienvenido' ); 
	window.location.href='menu-colaborador/ajustes.php';
   
   </script>";

}
else{
     print "<script language='JavaScript'>
    	alert('Datos Incorrectos, intenta de nuevo' );  
	window.location.href='index.php'; 
	</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>