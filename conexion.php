<?php
$database = 'personas_db';
// $server = 'localhost';
$user = 'root';
$password = '';

try {
  $conexion=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);
  //$con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} 
catch (PDOException $e) {
  die('Error de conexion: ' . $e->getMessage());
}

?>
 