<?php
    include_once 'conexion.php';


    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $sql = "INSERT INTO usuario (numero_documento, fk_id_tipodoc, primer_nombre, segundo_nombre, 
      primer_apellido, segundo_apellido, direccion, email, password)
      VALUES (:numero_documento, :fk_id_tipodoc, :primer_nombre, :segundo_nombre, 
      :primer_apellido, :segundo_apellido, :direccion, :email, :password)";
      $dato = $conexion->prepare($sql);
      $dato->bindParam(':numero_documento', $_POST['numero_documento']);
      $dato->bindParam(':fk_id_tipodoc', $_POST['fk_id_tipodoc']);
      $dato->bindParam(':primer_nombre', $_POST['primer_nombre']);
      $dato->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
      $dato->bindParam(':primer_apellido', $_POST['primer_apellido']);
      $dato->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
      $dato->bindParam(':direccion', $_POST['direccion']);
      $dato->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $dato->bindParam(':password', $password);
  
      if ($dato->execute()) {
        $message = 'Usuario creado satisfactoriamente';
      } else {
        $message = 'ha ocurrido un error al crear su usuario o contraseña';
      }
    }

    // if (isset($_POST['guardar'])) {
    //     $identificacion = $_POST['numero_documento'];
    //     $nombre1 = $_POST['primer_nombre'];
    //     $nombre2 = $_POST['primer_nombre'];
    //     $apellido1 = $_POST['primer_apellido'];
    //     $apellido2 = $_POST['primer_apellido'];
    //     $direccion = $_POST['direccion'];
    //     $telefono = $_POST['telefono'];
    //     $email = $_POST['email'];
    //     $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //     $dato->bindParam(':password', $password);

    //     if (!empty($identificacion) && !empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($email)) {
    //         if (!filter_var ($email, FILTER_VALIDATE_EMAIL)) {
    //             echo "<script>alert('correo no valido');</script>";
    //         }
    //         else {
    //             $consulta_insert = $conexion-> prepare ('insert into usuario (numero_documento, primer_nombre, segundo_nombre, 
    //             primer_apellido, segundo_apellido, departamento, ciudad, direccion, email, contraseña, telefono, fk_id_rol, fk_id_documento, fk_id_producto)) 
    //             VALUES(:primer_nombre,:primer_apellido, :numero_documento,:telefono,:email)');
    //             $consulta_insert -> execute(array(
    //                 ':nombre' =>$nombre,
    //                 ':apellido' =>$apellido,
    //                 ':identificacion' =>$identificacion,
    //                 ':telefono' =>$telefono,
    //                 ':correo' =>$email
    //             ));
    //             header('location: index.php');
    //         }
    //     }
    //     else {
    //         echo "<script> alert('Los campos estan vacios');</script>";
    //     }
    // }

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

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar Sesion</a></span>

        <form action="" method="post">
            <div class="form-grup">
                <input type="text" name="identificacion" placeholder="identificacion" class="input_text">
                <input type="text" name="fk_id_tipodoc" placeholder="Tipo documento" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="primer_nombre" placeholder="Primer Nombre" class="input_text">
                <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="primer_apellido" placeholder="Primer Apellido" class="input_text">
                <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="direccion" placeholder="direccion" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="email" placeholder="email" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="password" placeholder="Ingresar contraseña" class="input_text">
                <input type="text" name="confirmar_password" placeholder="Confirmar contraseña" class="input_text">
            </div>
            <div class="btn-group">
                <a href="index.php" class="btn btn_danger">Cancelar</a>
                <input type="submit" name="guardar" value="guardar" class="btn btn_primary">
            </div>           
        </form>
    </div>
</body>
</html>