<?php 
require_once('../conf/connexion.php');
$conexion = $conn;

$id = $_POST['id'];

$consulta = "DELETE FROM oferts WHERE ID = " .$id;
echo $resultado = mysqli_query($conexion, $consulta);
?>