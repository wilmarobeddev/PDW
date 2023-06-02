<?php
	
	session_start();
		
		require_once ("../conf/connexion.php");//Contiene funcion que conecta a la base de datos
		$con = $conn;
		
		$placaveh = $con->real_escape_string($_POST['placa']);

		// Consulta para obtener la fecha de vencimiento del SOAT
		$consulta1 = "SELECT Fecha_Vencimiento FROM documentos_vehiculo WHERE Placa = '$placaveh' AND Nombre_Documento = 'SOAT'";
		$result1 = $con->query($consulta1);
		$respuesta = new stdClass();

		if ($result1->num_rows > 0) {
			$fila = $result1->fetch_array();
			$respuesta->vencimientosoat = $fila['Fecha_Vencimiento'];
		}

		// Consulta para obtener la fecha de vencimiento del CDA
		$consulta2 = "SELECT Fecha_Vencimiento FROM documentos_vehiculo WHERE Placa = '$placaveh' AND Nombre_Documento = 'CDA'";
		$result2 = $con->query($consulta2);

		if ($result2->num_rows > 0) {
			$fila = $result2->fetch_array();
			$respuesta->vencimientocda = $fila['Fecha_Vencimiento'];
		}

		// Consulta para obtener la fecha de vencimiento de la tarjeta de operación
		$consulta3 = "SELECT Fecha_Vencimiento FROM documentos_vehiculo WHERE Placa = '$placaveh' AND Nombre_Documento = 'TO'";
		$result3 = $con->query($consulta3);

		if ($result3->num_rows > 0) {
			$fila = $result3->fetch_array();
			$respuesta->vencimientotop = $fila['Fecha_Vencimiento'];
		}

		$consulta4 = "SELECT 
		vehiculos.Cedula_Prop,
		propietarios.Nombre,
		vehiculos.Placa
		FROM
		vehiculos
		INNER JOIN propietarios ON (vehiculos.Cedula_Prop = propietarios.Cedula_Prop)
		WHERE (vehiculos.Placa = '$placaveh')";
		$result4 = $con->query($consulta4);

		if($result4->num_rows > 0){
			$fila = $result4->fetch_array();	
			$respuesta->Cedulapropietario = $fila['Cedula_Prop'];		
			$respuesta->Nombrepropietario = $fila['Nombre'];				
		}

		if (isset($_POST['cedula']))
		{
			$cedula = $con->real_escape_string($_POST['cedula']);
			$consulta5 = "SELECT Nombre FROM conductores WHERE Cedula_Cond = '$cedula'";
			$result5 = $con->query($consulta5);

			if ($result5->num_rows > 0) {
				$fila = $result5->fetch_array();
				$respuesta->nombreconductor = $fila['Nombre'];
		}
		}
		//linea comentada
		
		
		echo json_encode($respuesta);
?>