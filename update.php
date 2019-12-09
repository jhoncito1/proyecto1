  
<?php
	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$buscar_id=$conexion->prepare('SELECT * FROM personas WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(':id'=>$id));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $ciudad=$_POST['identificacion'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$id=(int) $_GET['id'];
		if(!empty($nombre) && !empty($apellido) && !empty($identificacion) && !empty($telefono) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$conexion->prepare(' UPDATE personas SET  
					nombre=:nombre,
					apellido=:apellido,
                    identificacion = ;identificacion,
					telefono=:telefono,
					correo=:correo
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
                    ':apellido' =>$apellido,
                    ':identificacion' =>$identificacion,
					':telefono' =>$telefono,
					':correo' =>$correo,
					':id' =>$id
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/insertar.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP </h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input_text">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input_text">
			</div>
			<div class="form-group">
                <input type="text" name="identificacion" value="<?php if($resultado) echo $resultado['identificacion']; ?>" class="input_text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input_text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input_text">
			</div>
			<div class="btn_group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>