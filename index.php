<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT * password FROM personas WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $resultado = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($resultado) > 0) {
      $user = $resultado;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($_SESSION)): ?> 
      <br>Bienvenido. <?= $user['nombre']; ?> 
      <br> Has iniciado sesión correctamente
      <a href="logout.php">Salir</a>
    <?php else: ?>
      <h1>Ingrese o registrese</h1> 

      <a href="login.php">Iniciar sesion</a> o
      <a href="signup.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
