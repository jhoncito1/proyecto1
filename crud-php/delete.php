<?php
    include_once 'conexion.php';
    if ($_GET['id']) {
        $id = (int) $_GET['id'];
        $delete = $conexion -> prepare('delete * from personas where id = :id');
        $delete -> execute(array(':id'= $id));
        header('location: index.php');
    }
    else {
        header('location: index.php');
    }
?>