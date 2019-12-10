<?php
session_start();

	include_once 'conexion.php';
	if(isset($_GET['numero_documento'])){
		$numero_documento= $_GET['numero_documento'];
		$buscar_id=$conexion->prepare('SELECT * FROM usuario WHERE numero_documento=:numero_documento LIMIT 1');
		$buscar_id->execute(array(':numero_documento'=>$numero_documento));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}
	if(isset($_POST['guardar'])){
		$numero_documento= $_GET['numero_documento'];
		$tipodoc=$_POST['fk_id_tipodoc'];
		$nombre=$_POST['primer_nombre'];
		$nombre2=$_POST['segundo_nombre'];
		$apellido=$_POST['primer_apellido'];
		$apellido2=$_POST['segundo_apellido'];
		$$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];
		
		
		if(!empty($numero_documento) && !empty($tipodoc) && !empty($nombre) && !empty($nombre2) && !empty($apellido) 
		&& !empty($apellido2) && !empty($direccion) && !empty($telefono) && !empty($email) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$conexion->prepare(' UPDATE usuario SET  
					numero_documento=:numerodocumento,
					fk_id_tipodoc=:fk_id_tipodoc,
					primer_nombre=:primer_nombre,
					segundo_nombre=:segundo_nombre,
					primer_apellido=:primer_apellido,
					segundo_apellido=:segundo_apellido,
					direccion=:direccion,
					telefono=:telefono,
					email=:email
					WHERE numero_documento=:numero_documento;'
				);
				$consulta_update->execute(array(
					':numero_documento' =>$numero_documento,
					':fk_id_tipodoc' =>$tipodoc,
					':primer_nombre' =>$nombre,
					':segundo_nombre' =>$nombre2,
					':primer_apellido' =>$apellido,
					':segundo_apellido' =>$apellido2,
					':direccion' =>$direccion,
					':telefono' =>$telefono,
					':email' =>$email
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
	<link rel="stylesheet" href="assets/css/insertar.css">
</head>
<body>
<?php require 'partials/header.php' ?>

	<div class="contenedor">
		<h2>CRUD EN PHP </h2>
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
                <input type="text" name="telefono" placeholder="Telefono" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="email" placeholder="email" class="input_text">
            </div>
            <div class="form-grup">
                <input type="text" name="password" placeholder="Ingresar contraseña" class="input_text">
                <input type="text" name="confirmar_password" placeholder="Confirmar contraseña" class="input_text">
            </div>
			<div class="btn_group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>