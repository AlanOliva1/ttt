<?php
        session_start();

        if (isset($_SESSION['usuario_id'])) {
            
        } else {
            header("Location:../index.php");
        }

        $userid =$_SESSION['usuario_id'];
        ?>