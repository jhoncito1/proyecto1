<?php

  require 'conexion.php';

  $message = '';

  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO personas (nombre,correo, password) VALUES (:nombre, :correo, :password)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado satisfactoriamente';
    } else {
      $message = 'ha ocurrido un error al crear su usuario o contraseña';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrese</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar Sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="nombre" type="text" placeholder="nombre">
      <input name="correo" type="text" placeholder="usuario@ingrese.com">
      <input name="password" type="password" placeholder="Ingrese Contraseña">
      <input name="confirm_password" type="password" placeholder="Confirme contraseña">
      <input type="submit" value="Enviar">
    </form>

  </body>
</html>
