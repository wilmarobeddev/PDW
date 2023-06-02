
///Funcion para agregar
function agregar() {
	// Obtener los valores del formulario
	var formnuevo = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudconductor/procesacondb.php",
		data: formnuevo,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$('#tabla').load('include/pagconductor.php');
				alertify.alert("El registro se guardó correctamente", function () {
					alertify.success('Datos agregados');
				});
			} else {
				alertify.error("Algo salió mal en el proceso: " + response.message);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			alertify.error("Ocurrió un error en la solicitud: " + errorThrown);
		}
	});
}


///Funcion para mostrar en el modal
function agregaform(datoseditar) {
	arreglo = datoseditar.split("||");
        $('#id1').val(arreglo[0])
        $('#cedula1').val(arreglo[1])
        $('#nombre1').val(arreglo[2])
        $('#cat1').val(arreglo[3])
        $('#vencimiento1').val(arreglo[4])
}

///Funcion para editar
function update() {
	var formedicion = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudconductor/editarcondb.php",
		data: formedicion,
		success: function (r) {

			if (r == 1) {
				$('#tabla').load('include/pagconductor.php');
				alertify.alert("El registro se actualizo correctamente ", function () {
					alertify.success('Datos Editados');
				});
			} else {
				alertify.error("Algo salio mal..." + " | " + r);
			}
		}
	});

}

///Funcion para confirmar y eliminar el registro

function confirmar(id) {
	alertify.confirm('Eliminar Registro', '¿Esta seguro de eliminar este registro?',
		function () { eliminar(id) }
		, function () { alertify.error('Operacion cancelada') });
}

function eliminar(id) {

	cadena = "id=" + id;

	$.ajax({
		type: "POST",
		url: "crudconductor/eliminarcondb.php",
		data: cadena,
		success: function (r) {
			if (r == 1) {
				$('#tabla').load('include/pagconductor.php');
				alertify.success("El registro se elimino correctamente!");
			} else {
				// alertify.error("Algo salio mal en el proceso:(");
				alertify.error("Algo salio mal..." + " | " + r);
			}
		}
	});
}
