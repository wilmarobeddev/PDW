<?php 
require_once('../conf/connexion.php');
$conexion = $conn;

$id = $_POST['id'];

$consulta = "DELETE FROM documentos_vehiculo WHERE Id_Doc = " .$id;
echo $resultado = mysqli_query($conexion, $consulta);
?>