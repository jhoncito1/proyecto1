<?php
    $database ='diverpark';
    $user = 'root';
    $password = '';
    try{
        $conexion = new PDO('mysql: host = localhost; dbname='.$database, $user, $password);
    }
    catch(PDOException $e){
        echo "Error".$e-> getMessage();

    }
?>
