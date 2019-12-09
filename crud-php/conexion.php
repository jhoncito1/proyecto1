<?php
    $database ='personas_db';
    $user = 'root';
    $password = '';
    try{
        $conexion = new PDO('mysql: host = localhost; dbname='.$database, $user, $password);
    }
    catch(PDOException $e){
        echo "Erros".$e-> getMessage();

    }
?>
