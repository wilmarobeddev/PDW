
///Funcion para agregar
function agregar() {
	// Obtener los valores del formulario
	var formnuevo = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudpropietarios/procesaprodb.php",
		data: formnuevo,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$('#loadtabla').load('include/pagpropietarios.php');
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
function agregaform(datos) {
	d = datos.split('||');
	$('#cedulas').val(d[0]);
	$('#nombres').val(d[1]);
	$('#direcciones').val(d[2]);
	$('#notass').val(d[3]);


}

///Funcion para editar
function update() {
	var formedicion = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudpropietarios/editarprodb.php",
		data: formedicion,
		success: function (r) {

			if (r == 1) {
				$('#loadtabla').load('include/pagpropietarios.php');
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
		url: "crudpropietarios/eliminarprodb.php",
		data: cadena,
		success: function (r) {
			if (r == 1) {
				$('#loadtabla').load('include/pagpropietarios.php');
				alertify.success("El registro se elimino correctamente!");
			} else {
				// alertify.error("Algo salio mal en el proceso:(");
				alertify.error("Algo salio mal..." + " | " + r);
			}
		}
	});
}
