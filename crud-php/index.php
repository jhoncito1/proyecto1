<?php
    include_once 'conexion.php';
    $sentencia_select =$conexion->prepare('SELECT *FROM personas ORDER BY id asc');
	$sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();
    if (isset($_POST['btn_buscar'])) {
        $buscar_text = $_POST['buscar'];
        $select_buscar = $conexion -> prepare('SELECT *FROM clientes WHERE nombre LIKE :campo OR apellidos LIKE :campo;');
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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    

    
    
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
                <td>id</td>
                <td>nombre</td>
                <td>apellido</td>
                <td>identificacion</td>
                <td>telefono</td>
                <td>correo</td>
                <td colspan="2">accion</td>
            </tr>
        
            <?php foreach($resultado as $filas):?>
                <tr>
                    <td><?php echo $filas ['id']?></td>
                    <td><?php echo $filas ['nombre']?></td>
                    <td><?php echo $filas ['apellido']?></td>
                    <td><?php echo $filas ['identificacion']?></td>
                    <td><?php echo $filas ['telefono']?></td>
                    <td><?php echo $filas ['correo']?></td>
                    <td><a href="update.php?id = <?php echo filas['id']; ?>" class="btn_update">Editar</a></td>
                    <td><a href="delete.php?id = <?php echo filas['id']; ?>" class="btn_delete">Eliminar</a></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
</body>
</html>