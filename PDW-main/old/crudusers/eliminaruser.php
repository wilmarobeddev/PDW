<?php
if (!isset($conn)){
require_once('../conf/connexion.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$deluser = $_GET['id'];

	// Consulta preparada para eliminar el usuario
	$stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
	$stmt->bind_param("i", $deluser);
	if ($stmt->execute()) {
		$success_msg = "Se eliminó el usuario.";
	} else {
		$alert_error = "Error al eliminar el usuario.";
	}


	if (isset($alerterror)) {

?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong>
			<?php
			echo $alerterror;
			?>
		</div>
	<?php
	}
	if (isset($success_msg)) {
	?>
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Bien hecho!</strong>
			<?php
			echo $success_msg;
			?>
		</div>
<?php
	}
	header('Location: ../users.php');
}
?>
