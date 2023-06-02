<?php
require_once('../conf/connexion.php');
function validar_placa($placa)
{
	// La placa debe tener 6 caracteres
	if (strlen($placa) !== 6) {
		return false;
	}
	// La placa debe contener al menos una letra y un número
	if (!preg_match("/[a-zA-Z]/", $placa) || !preg_match("/\d/", $placa)) {
		return false;
	}
	// La placa debe contener al menos tres letras
	if (preg_match_all("/[a-zA-Z]/", $placa) < 3) {
		return false;
	}
	return true;
}


$id = $_POST['id'];
$placa = $_POST['placa'];
$nombredoc = $_POST['nombredoc'];
$vence = $_POST['vence'];
$notas = $_POST['notas'];
$respuesta="";

if (!validar_placa($placa)) {
	//$respuesta = "La placa debe tener una longitud exacta de 6 caracteres, con al menos 3 letras";
	$respuesta = array('success' => false, 'message' => 'La placa debe tener una longitud exacta de 6 caracteres, con al menos 3 letras');
} else {
	// Convertir la placa a mayúsculas
	$placa = strtoupper($placa);

	// Actualizar el registro existente
	if (isset($_POST['id'])) {
		$sql_update = "UPDATE documentos_vehiculo SET Nombre_Documento='$nombredoc', Fecha_Vencimiento='$vence', Notas='$notas' WHERE Id_doc='$id'";
		$result_update = mysqli_query($conn, $sql_update);

		if ($result_update) {
			$respuesta = array('success' => true);
		} else {
			$respuesta = array('success' => false, 'message' => 'No se insertaron los datos');
		}
	}
}

echo json_encode($respuesta);
exit();
?>
