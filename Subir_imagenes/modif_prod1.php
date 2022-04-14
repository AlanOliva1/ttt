<?php
  
  $consulta=ConsultarProducto($_GET['no']);

  function ConsultarProducto( $no_prod )
  {
   include 'conexion.php';
   $sentencia="SELECT * FROM productos WHERE no='".$no_prod."' ";
   $resultado= $conexion->query($sentencia) or die ("Error al consultar producto".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc();

   return [
    $fila['id_producto'],
    $fila['nombre'],
    $fila['descripcion']
   ];
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Modificar Producto</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="bootstrap-fileinput-master/css/fileinput.css" rel="stylesheet" type="text/css">
<link href="bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css">
<script src="bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
  
  <div id="cabecera">
  	<img src="images/swirl.png" width="1188" id="img1">
  </div>
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Producto</h1> </span>
  		<br>
	  <form action="modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" enctype="multipart/form-data" >
      <input type="hidden" name="no"  value="<?php echo $_GET['no']?>">
  		<label>Id Producto: </label>
  		<input type="text" id="id_producto" name="id_producto" value="<?php echo $consulta[0] ?>" ><br>
  		
  		<label>Producto: </label>
  		<input type="text" id="producto" name="producto" value="<?php echo $consulta[1] ?>"><br>
  		
  		<label>Descripcion: </label>
  		<textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion"> <?php echo $consulta[2] ?>  </textarea><br>

      <input type="file" name="file1" id="file1">
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  
	<div id="footer">
  		<img src="images/swirl2.png" id="img2">
  	</div>

</div>


</body>
</html>

<script>
$("#file-1").fileinput({
showCaption: false,
browseClass: "btn btn-primary btn-lg",
fileType: "any"
});
</script>