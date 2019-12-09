<?php
session_start();

    include_once 'conexion.php';
    if ($_GET['numero_documento']) {
        $id = (int) $_GET['numero_documento'];
        $delete = $conexion -> prepare('delete * from usuario where numero_documento = :numero_documento');
        $delete->execute(array(':numero_documento'=> $numero_documento));
        header('location: index.php');
    }
    else {
        header('location: index.php');
    }
?>