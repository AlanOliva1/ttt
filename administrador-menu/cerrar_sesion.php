<?php
	
	session_start();
	session_destroy();

	print "<script language='JavaScript'>
    	alert('¡Nos vemos!' );  
	window.location.href='../index.php'; 
	</script>";




        ?>