<?php
    include_once 'conexion.php';
    if (isset($_POSt['guardar'])) {
        $nommre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $identificacion = $_POST['identificacion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        if (!empty(nombre) && !empty(apellido) && !empty(identificacion) && !empty(telefono) && !empty(correo)) {
            if (!filter_var ($correo, filter_validate_email)) {
                echo "<script>alert('correo no valido');</script>";
            }
            else {
                $consulta_insert = $conexion-> prepare ('insert into personas(nombre,apellidos,identificacion,telefono,correo) 
                VALUES(:nombre,:apellidos, :identificacion,:telefono,:correo)');
                $consulta_insert -> execute(array(
                    ':nombre' =>$nombre,
                    ':apellido' =>$apellido,
                    ':identificacion' =>$identificacion,
                    ':telefono' =>$telefono,
                    ':correo' =>$correo
                ));
                header('location: index.php');
            }
        }
        else {
            echo "<script> alert('Los campos estan vacios');</script>";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertar</title>
    <link rel="stylesheet" href="css/insertar.css">
</head>
<body>
    <div class="container">
        <h2>Insertar</h2>
        <form action="" method="post">
            <div class="form-grup">
                <input type="text" name="nombre" placeholder="Nombre" class="input_text">
                <input type="text" name="apellido" placeholder="Apellido" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="identificacion" placeholder="identificacion" class="input_text">
                <input type="text" name="telefono" placeholder="Telefono" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="correo" placeholder="Correo" class="input_text">
            </div>
            <div class="btn-group">
                <a href="index.php" class="btn btn_danger">Cancelar</a>
                <input type="submit" name="guardar" value="guardar" class="btn btn_primary">
            </div>           
        </form>
    </div>
</body>
</html>