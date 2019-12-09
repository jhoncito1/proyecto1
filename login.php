<?php
  session_start();
 
  require 'conexion.php';

    if (!empty($_POST['correo']) && !empty($_POST['password'])) {
      $records = $conexion->prepare('SELECT * FROM personas WHERE correo = :correo');
      $records->bindParam(':correo', $_POST['correo']);
      $records->execute();
      $resultado = $records->fetch(PDO::FETCH_ASSOC);
      
      $message = '';
      // $message = password_verify($_POST['password'], $resultado['password']);
  
      // print_r('');die;
       
      if (count($resultado) > 0 && password_verify($_POST['password'], $resultado['password'])) {
      
        $_SESSION['user_id'] = $resultado['id'];
        
        header("Location: update.php");
      } 
      else {
        $message = 'Error, usuario y contraseña no coinciden';
      }
    }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar Sesion</h1>
    <span>o <a href="signup.php">Registrarse</a></span>

    <form action="login.php" method="POST">
      <input name="correo" type="text" placeholder="ingrese@usuario.com">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>
