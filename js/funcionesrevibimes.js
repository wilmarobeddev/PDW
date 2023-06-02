function agregar() {


	var formnuevo = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudrevbimestral/procesarevbimesdb.php",
		data: formnuevo,
		success: function (r) {
			if (r != 1) {
				alertify.error("Algo salio mal..." + " | " + r);
				
			} else {
				$("#tabla").load("include/paginadorevbimestral.php");
				// Verificar el valor de r antes de mostrar la alerta
				alertify.success('Datos Ingresados');
			}
		}
	});
}


// ACTUALIZAR ////////////////////////////////////////////////////////

///Funcion para mostrar en el modal
function agregaform(datos) {
	d = datos.split('||');
	$('#ide').val(d[0]);
	$('#nousearray').val(d[1]);
	$('#fecentradae').val(d[2]);
	$('#placae').val(d[3]);
	$('#rutae').val(d[4]);
	$('#cedulaprope').val(d[5]);
	$('#cedulaconductore').val(d[6]);
	$('#nousearray').val(d[7]);
	$('#vencexte').val(d[8]);
	$('#nousearray').val(d[9]);
	$('#kme').val(d[10]);
	$('#estadoe').val(d[11]);
	$('#observacionese').val(d[12]);
	$('#nousearray').val(d[13]);
	$('#inspeccione').val(d[14]);
}

function actualizar() {
	var formeditar = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudrevbimestral/editarevbimesdb.php",
		data: formeditar,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$("#tabla").load("include/paginadorevbimestral.php");
				// Verificar el valor de r antes de mostrar la alerta
				alertify.success('Datos Editados');
			} else {
				alertify.error("Algo salio mal..." + " | " + r);
			}
		}
	});

}
// ///Funcion para editar
// function actualizar() {
// 	var cadena = $("#myFormedit").serialize();
// 	$.ajax({
// 		type: "POST",
// 		url: "crudrevbimestral/editarevbimesdb.php",
// 		data: cadena,
// 		success: function (response) {
// 			// Se ejecuta cuando la petición se completa exitosamente
// 			if (response == "1") {
// 				// ...			  
// 				$("#tabla").load("include/paginadorevbimestral.php");
// 				// Verificar el valor de r antes de mostrar la alerta
// 				alertify.alert("El registro se guardo correctamente", function () {
// 					alertify.success('Datos agregados');
// 				});
// 			} else {
// 				alertify.error("Algo salio mal..." + " | " + r);
// 			}
// 		}
// 	});

// }


////ELIMINAR //////////////////////////////////////////////////////////////

///Funcion para confirmar y eliminar el registro
function confirmar(id) {
	alertify.confirm('Eliminar Registro', '¿Esta seguro de eliminar este registro?',
		function () { eliminar(id) }
		, function () { alertify.error('Operacion cancelada') });
}

function eliminar(id) {

	cadeliminar = "id=" + id;

	$.ajax({
		type: "POST",
		url: "crudrevbimestral/eliminar.php",
		data: cadeliminar,
		success: function (response) {
			if (response) {
				$('#tabla').load('include/paginadorevbimestral.php');
				alertify.success('Datos Eliminados');
			} else {
				alertify.error("Algo salió mal en el proceso:(");
			}
		}
	});
}



