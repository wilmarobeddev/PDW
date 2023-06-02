<?php
if (!isset($conn)) {
	require_once('../conf/connexion.php');
}

$id = $_POST['id'];

$consulta = "DELETE FROM users WHERE user_id = " . $id;
echo $resultado = mysqli_query($conn, $consulta);

?>
