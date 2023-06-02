<?php
if (!isset($conn)) {
	include('../include/header.php');
	require_once('../conf/connexion.php');
}

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

if (isset($_POST['procesar'])) {

	$id = $_POST['id'];
	$placa = $_POST['placa'];
	$nombredoc = $_POST['nombredoc'];
	$vence = $_POST['vence'];
	$notas = $_POST['notas'];

		if (!validar_placa($placa)) {
			$alerterror = "La placa debe tener una longitud exacta de 6 caracteres, con al menos 3 letras";
		} else {	
		// Convertir la placa a mayúsculas
		$placa = strtoupper($placa);
		
		// Verificar si el registro que se está actualizando es diferente del registro existente
		$sql_exist = "SELECT * FROM documentos_vehiculo WHERE Placa='$placa' AND Nombre_Documento='$nombredoc' AND Id_doc <> '$id'";
		$result_exist = mysqli_query($conn, $sql_exist);
		if (mysqli_num_rows($result_exist) > 0) {
			$alerterror = "Documento ya existe!!!";
		} else {
			// Actualizar el registro existente
			if (isset($_POST['id'])) {
				$sql_update = "UPDATE documentos_vehiculo SET Nombre_Documento='$nombredoc', Fecha_Vencimiento='$vence', Notas='$notas' WHERE Id_doc='$id'";
				$result_update = mysqli_query($conn, $sql_update);
			}

			// Insertar un nuevo registro
			$sqlexistxx = "select * from documentos_vehiculo WHERE Placa='$placa' AND Nombre_Documento='$nombredoc'";
			$resultexistxx = mysqli_query($conn, $sqlexistxx);
			if (mysqli_num_rows($resultexistxx) == 0) {
				$sql_insert = "INSERT INTO documentos_vehiculo (Placa, Nombre_Documento, Fecha_Vencimiento, Notas) VALUES ('$placa', '$nombredoc', '$vence', '$notas')";
				$result_insert = mysqli_query($conn, $sql_insert);
			}
				

			if (isset($result_update) || isset($result_insert)) {
					$sucessmsj = " Se ejecuto la operacion con éxito.";
				} else {
					$alerterror = "Error en insercion de datos";
					echo "Error: " . mysqli_error($conn);
					exit;
				}
			}
		}

		if (isset($alerterror)) {

?>
		<div class="alert alert-danger" role="alert" style="padding:3; margin:0;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong>
			<?php
			echo $alerterror;
			?><br>
		</div>

	<?php
	}
	if (isset($sucessmsj)) {

	?>
		<div class="alert alert-success" role="alert" style="padding:3; margin:0;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Bien hecho!</strong>
			<?php
			echo $sucessmsj;
			?>
		</div>
<?php
	}
}
?>