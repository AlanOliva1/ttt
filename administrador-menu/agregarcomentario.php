<?php
$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'u205223607_ttt'
);
$comentario_transporte = (isset($_POST['comentario_transporte'])) ? $_POST['comentario_transporte'] : '';
$id_transporte = (isset($_POST['id_transporte'])) ? $_POST['id_transporte'] : '';

$up_comentario = "UPDATE transportes set comentario_transporte='$comentario_transporte' where id_transporte=$id_transporte";
if (mysqli_query($connection, $up_comentario)) {
    print 3;
}
