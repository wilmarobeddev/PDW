
function agregar() {


	var formnuevo = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudrevisiones/procesarevdb.php",
		data: formnuevo,
		success: function (r) {
			if (r != 1) {
				alertify.error("Algo salio mal..." + " | " + r);
				//alert("Algo salio mal..." + " | " + r);
				
			} else {
				$("#tabla").load("include/paginadorevdia.php");
				// Verificar el valor de r antes de mostrar la alerta
				alertify.success('Datos Ingresados');
				//alert('Datos Ingresados');
			}
		}
	});
}
// function agregar() {
//     var formData = new FormData($('#myForm')[0]); // Obtener los datos del formulario en un objeto FormData

//     $.ajax({
//         type: "POST",
//         url: "crudrevisiones/procesarevdb.php",
//         data: formData,
//         processData: false, // Evitar el procesamiento automático de los datos
//         contentType: false, // Evitar la configuración automática del tipo de contenido
//         success: function(r) {
//             if (r != 1) {
//                 alertify.error("Algo salió mal..." + " | " + r);
//             } else {
//                 $("#tabla").load("include/paginadorevdia.php");
//                 alertify.success('Datos Ingresados');
//             }
//         }
//     });
// }



//Se cambio esta funcion por un action y una redireccion!!



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
///Funcion para editar
function actualizar() {
	var formeditar = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type: "POST",
		url: "crudrevisiones/editarevdb.php",
		data: formeditar,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$('#tabla').load('include/paginadorevdia.php');
				// Verificar el valor de r antes de mostrar la alerta
				alertify.alert("El registro se actualizo correctamente", function () {
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

	cadeliminar = "id=" + id;

	$.ajax({
		type: "POST",
		url: "crudrevisiones/eliminar.php",
		data: cadeliminar,
		dataType: "json", // Especificar que esperamos recibir JSON del servidor
		success: function (response) {
			if (response.success) {
				$('#tabla').load('include/paginadorevdia.php');
				alertify.success('Datos Eliminados');
			} else {
				alertify.error("Algo salió mal en el proceso:(");
			}
		}
	});
}



