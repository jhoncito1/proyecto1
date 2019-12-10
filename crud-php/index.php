<?php
session_start();

    include_once 'conexion.php';
    $sentencia_select =$conexion->prepare('SELECT *FROM usuario ORDER BY numero_documento asc');
	$sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();
    if (isset($_POST['btn_buscar'])) {
        $buscar_text = $_POST['buscar'];
        $select_buscar = $conexion -> prepare('SELECT *FROM usuario WHERE primer_nombre LIKE :campo OR primer_apellido LIKE :campo;');
        $select_buscar -> execute (array('campo'=> "%".$buscar_text. "%"));
        $resultado= $select_buscar -> fetchAll();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD-PHP</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    
<?php require 'partials/header.php' ?>
    
    
<?php if(!empty($_SESSION)): ?> 
      <br>Bienvenido. <?= $user['nombre']; ?> 
      <br> Has iniciado sesión correctamente
      <a href="logout.php">Salir</a>

      <div class="container">
        <h2>CRUD PHP</h2>

        <div class="barra_buscador">
            <form action="" class="formulario" method="post">
                <input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
                value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input_text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                <a href="insertar.php" class="btn btn_nuevo">Nuevo</a>
            </form>
        </div>
        
        <table>
            <tr class="head">
                <td>Documento</td>
                <td>Tipo Doc</td>
                <td>Primer nombre</td>
                <td>Segundo nombre</td>
                <td>Primer apellido</td>
                <td>Segundo apellido</td>
                <td>Direccion</td>
                <td>correo</td>
                <td colspan="2">accion</td>
            </tr>
        
            <?php foreach($resultado as $filas):?>
                <tr>
                    <td><?php echo $filas ['numero_documento']?></td>
                    <td><?php echo $filas ['fk_id_tipodoc']?></td>
                    <td><?php echo $filas ['primer_nombre']?></td>
                    <td><?php echo $filas ['segundo_nombre']?></td>
                    <td><?php echo $filas ['primer_apellido']?></td>
                    <td><?php echo $filas ['segundo_apellido']?></td>
                    <td><?php echo $filas ['direccion']?></td>
                    <td><?php echo $filas ['email']?></td>
                    <td><a href="update.php?id = <?php echo $filas['numero_documento']; ?>" class="btn_update">Editar</a></td>
                    <td><a href="delete.php?id = <?php echo $filas['numero_documento']; ?>" class="btn_delete">Eliminar</a></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>



    <?php else: ?>
      <h1>Ingrese o registrese</h1> 

      <a href="login.php">Iniciar sesion</a> o
      <a href="insertar.php">Registrarse</a>
    <?php endif; ?>

</body>
</html>