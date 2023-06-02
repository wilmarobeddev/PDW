///Funcion para agregar
function agregar() {
	// Obtener los valores del formulario
	var formnuevo = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "cruddocs/procesadocdb.php",
		data: formnuevo,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$("#tabla").load("include/paginadocs.php");
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
function agregaform(cargardatos) {
	array = cargardatos.split('||');
	$('#id_e').val(array[0])
	$('#placa_e').val(array[1])
	$('#nombre_e').val(array[2])
	$('#vence_e').val(array[3])
	$('#notas_e').val(array[4])
}



///Funcion para editar
function update() {
	var formeditar = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "cruddocs/editardocdb.php",
		data: formeditar,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$('#tabla').load('include/paginadocs.php');
				// Verificar el valor de r antes de mostrar la alerta
				alertify.alert("El registro se actualizo correctamente", function () {
					alertify.success('Datos Editados');
				});
			} else {
				alertify.error("Algo salio mal..." + " | " + response);
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
		url: "crudoferts/eliminarofertdb.php",
		data: cadena,
		success: function (r) {
			if (r == 1) {
				$('#tabla').load('include/pagoferts.php');
				alertify.success("El registro se elimino correctamente!");
			} else {
				alertify.error("Algo salio mal..." + " | " + r);
			}
		}
	});
}



