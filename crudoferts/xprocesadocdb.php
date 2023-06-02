	<?php
	require_once('../conf/connexion.php');
	$conexion = $conn;
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

	//$id = $_POST['id'];
	$placa = $_POST['placa'];
	$nombredoc = $_POST['nombredoc'];
	$vence = $_POST['vence'];
	$notas = $_POST['notas'];
	$respuesta = "";

	if (!validar_placa($placa)) {
		$respuesta = array('success' => false, 'message' => 'La placa debe tener una longitud exacta de 6 caracteres, con al menos 3 letras');
	} else {
		// Convertir la placa a mayúsculas
		$placa = strtoupper($placa);

		$sqlexistxx = "select * from documentos_vehiculo WHERE Placa='$placa' AND Nombre_Documento='$nombredoc'";
		$resultexistxx = mysqli_query($conn, $sqlexistxx);
		if (mysqli_num_rows($resultexistxx) > 0) {
			//$respuesta = "Documento ya existe!!!";
			$respuesta = array('success' => false, 'message' => 'Documento ya existe!!!');
		} else {
			$sql_insert = "INSERT INTO documentos_vehiculo (Placa, Nombre_Documento, Fecha_Vencimiento, Notas) VALUES ('$placa', '$nombredoc', '$vence', '$notas')";
			$result_insert = mysqli_query($conn, $sql_insert);

			if ($result_insert) {
				$respuesta = array('success' => true);
			} else {
				$respuesta = array('success' => false, 'message' => 'Error al insertar en la base de datos.');
			}
		}
	}
	echo json_encode($respuesta);
	?>