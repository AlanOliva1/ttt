<?php

	ModificarProducto($_POST['no'], $_POST['id_producto'], $_POST['producto'], $_POST['descripcion'] );

	function ModificarProducto($no, $id_prod, $nom, $descrip)
	{
		include 'conexion.php';
		echo $sentencia="UPDATE productos SET id_producto='".$id_prod."', nombre='".$nom."', descripcion='".$descrip."' WHERE no='".$no."' ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	}

	if ($_FILES["file1"]["error"] > 0)
	{
	} else 
	{

		$nom_archivo=$_FILES['file1']['name']; // Para conocer el nombre del archivo
		$ruta = "images/" . $nom_archivo;  // La ruta del archivo contiene el nuevo nombre y el tipo de extension
		$archivo = $_FILES['file1']['tmp_name']; //el arhivo a subir
		$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo
		echo $sentencia_img="UPDATE productos SET imagen='$ruta' WHERE no='".$_POST['no']."' ";
		$conexion->query($sentencia_img) or die ("Error al actualizar datos".mysqli_error($conexion));
		
	}

	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index.php';
</script>