
$(document).ready(function() {
	$('#guardar').click(function(event) {
	  event.preventDefault(); // Evita el comportamiento predeterminado del formulario (envío GET)
  
	  agregar(); // Llama a la función agregar() para realizar la solicitud AJAX
	});
  });
  
  function agregar() {
	// Serializar los datos del formulario
	var formData = $("#myForm").serialize();
  
	// Enviar los datos utilizando AJAX
	$.ajax({
	  url: "crudrevisiones/procesarevdb.php",
	  type: "POST",
	  data: formData,
	  success: function(response) {
		// Se ejecuta cuando la petición se completa exitosamente
		// if (response === "exito") {
			console.log.response;
		if (response.trim().toLowerCase() === "exito") {
				// ...			  
		$("#tabla").load("include/paginadorevdia.php");
		  alertify.success("El registro se guardó correctamente");
		} else {
		  alertify.error("Algo salió mal..." + " | " + response);
		}
	  },
	  error: function(xhr, status, error) {
		// Se ejecuta cuando hay un error en la petición
		console.log("Error al enviar el formulario: " + xhr.response);
		alertify.error("Error al enviar el formulario. Consulta la consola para más detalles.");
	  }
	});
  }
  

// function agregar() {
//     // Obtener los valores del formulario
//     var placa = $("#placa").val();
//     var fechaIngreso = $("#FechaIngreso").val();
//     var ruta = $("#ruta").val();
//     var cedulapropietario = $("#Cedulapropietario").val();
//     var cedulaconductor = $("#cedulaconductor").val();
//     var Cargarextintor = $('input[name="Cargarextintor"]:checked').val();
//     var vencimientoextintor = $("#Vencimientoextintor").val();
//     var equipocarretera = $('input[name="Equipocarretera"]:checked').val();
//     var kilometraje = $("#kilometraje").val();
//     var estadorev = $("#estadorev").val();
//     var observaciones2 = $("#observaciones2").val();
//     var firma = $("#firma").val();

//     cadena =
//         "placa=" + placa +
//         "&FechaIngreso=" + fechaIngreso +
//         "&ruta=" + ruta +
//         "&Cedulapropietario=" + cedulapropietario +
//         "&cedulaconductor=" + cedulaconductor +
//         "&Cargarextintor=" + Cargarextintor +
//         "&Vencimientoextintor=" + vencimientoextintor +
//         "&Equipocarretera=" + equipocarretera +
//         "&kilometraje=" + kilometraje +
//         "&estadorev=" + estadorev +
//         "&observaciones2=" + observaciones2 +
//         "&firma=" + firma;

//     $.ajax({
//         type: "POST",
//         url: "crudrevisiones/agregarevdb.php",
//         data: cadena,
//         success: function (response) {
//             if (response === "1") {
//                 $("#tabla").load("include/paginadorevdia.php");
//                 alertify.alert("El registro se guardó correctamente", function () {
//                     alertify.success("Datos agregados");
//                 });
//             } else {
//                 alertify.error("Algo salió mal..." + " | " + response);
//             }
//         },
//     });
// }





///Funcion para mostrar en el modal
function agregaform(datos){
	d=datos.split('||');
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
function update(){
	id=$('#ide').val();
	fecha=$('#fecentradae').val();
	placa=$('#placae').val();
	ruta=$('#rutae').val();
	Cedulapropietario=$('#cedulaprope').val();
	cedulaconductor=$('#cedulaconductore').val();
	vencexte=$('#vencexte').val();
	kilometraje=$('#kme').val();
	estadorev=$('#estadoe').val();
	observaciones=$('#observacionese').val();
	inspeccion=$('#inspeccione').val();

	cadena= "idrev=" + id +
			"&FechaIngreso=" + fecha +
			"&placa=" + placa +
			"&ruta=" + ruta +
			"&cedulaprop=" + Cedulapropietario +
			"&cedulaconductor=" + cedulaconductor +
			"&kilometraje=" + kilometraje +
			"&inspeccion=" + inspeccion +
			"&vencexte=" + vencexte +
			"&estadorev=" + estadorev +
			"&observaciones=" + observaciones;

	$.ajax({
		type:"POST",
		url:"crudrevisiones/editarevdb.php",
		data:cadena,
		success:function(r){
			if(r=="1"){
				$('#tabla').load('include/paginadorevdia.php');

				// Verificar el valor de r antes de mostrar la alerta
				alertify.alert("El registro se actualizo correctamente", function(){
					alertify.success('Datos Editados');
				});
			}else{
				alertify.error("Algo salio mal..." + " | "+ r);
			}
		}
	});

}
///Funcion para confirmar y eliminar el registro
function confirmar(id){
	alertify.confirm('Eliminar Registro', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminar(id) }
                , function(){ alertify.error('Operacion cancelada')});
}

function eliminar(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"crudrevisiones/eliminar.php",
		data:cadena,
		success:function(r){
			if(r=="1"){
				$('#tabla').load('include/paginadorevdia.php');
					alertify.success("El registro se elimino correctamente!");
				}else{
					alertify.error("Algo salio mal en el proceso:(");
				}
			}
		});
}



//DOCUMENTADO

// ///Funcion para agregar
// function agregar() {
// 	// Obtener los valores del formulario
// 	var idrev = document.getElementById("idrev").value;
// 	var FechaIngreso = document.getElementById("FechaIngreso").value;
// 	var placa = document.getElementById("placa").value;
// 	var ruta = document.getElementById("ruta").value;
// 	var Cedulapropietario = document.getElementById("Cedulapropietario").value;
// 	var cedulaconductor = document.getElementById("cedulaconductor").value;
// 	var Cargarextintor = document.getElementById("Cargarextintor").value;
// 	var Vencimientoextintor = document.getElementById("Vencimientoextintor").value;
// 	var Equipocarretera = document.getElementById("Equipocarretera").value;
// 	var kilometraje = document.getElementById("kilometraje").value;
// 	var estadorev = document.getElementById("estadorev").value;
// 	var observaciones2 = document.getElementById("observaciones2").value;
// 	var firma = document.getElementById("firma").value;

	
// 	cadena = "idrev=" + 
// 	idrev + "&FechaIngreso=" + 
// 	FechaIngreso + "&placa=" + 
// 	placa + "&ruta=" + 
// 	ruta + "&Cedulapropietario=" + 
// 	Cedulapropietario + "&cedulaconductor=" + 
// 	cedulaconductor + "&Cargarextintor=" + 
// 	Cargarextintor + "&Vencimientoextintor=" + 
// 	Vencimientoextintor + "&Equipocarretera=" + 
// 	Equipocarretera + "&kilometraje=" + 
// 	kilometraje + "&estadorev=" + 
// 	estadorev + "&observaciones2=" + 
// 	observaciones2 + "&firma=" + 
// 	firma;

// 	$.ajax({
// 		type:"POST",
// 		url:"crudpropietarios/agregarevdb.php",
// 		data:cadena,
// 		success:function(r){
// 			if(r=="1"){
// 				$('#tabla').load('include/paginadorevdia.php');

// 				// Verificar el valor de r antes de mostrar la alerta
// 				alertify.alert("El registro se guardo correctamente", function(){
// 					alertify.success('Datos agregados');
// 				});
// 			}else{
// 				alertify.error("Algo salio mal..." + " | "+ r);
// 			}
// 		}
// 	});

// }

// ///Funcion para mostrar en el modal
// function agregaform(datos){
// 	d=datos.split('||');
// 	$('#ide').val(array[0])
// 	$('#tiporeve').val(array[1])
// 	$('#fecentradae').val(array[2])
// 	$('#placae').val(array[3])
// 	$('#cedulaprope').val(array[4])
// 	$('#cedulaconductore').val(array[5])
// 	$('#cargaexte').val(array[6])
// 	$('#vencexte').val(array[7])
// 	$('#equipoce').val(array[8])
// 	$('#kme').val(array[9])
// 	$('#estadoe').val(array[10])
// 	$('#observacionese').val(array[11])
// 	$('#firmae').val(array[12])
// 	$('#inspeccione').val(array[13])
// }


// ///Funcion para editar
// function update(){
// 	idrev=$('#ide').val();
// 	tipo=$('#tiporeve').val();
// 	fecha=$('#fecentradae').val();
// 	Cedulapropietario=$('#cedulaprope').val();
// 	cedulaconductor=$('#cedulaconductore').val();
// 	Cargarextintor=$('#cargaexte').val();
// 	Vencimientoextintor=$('#vencexte').val();
// 	Equipocarretera=$('#equipoce').val();
// 	kilometraje=$('#kme').val();
// 	estadorev=$('#estadoe').val();
// 	observaciones2=$('#observacionese').val();
// 	firma=$('#firmae').val();
// 	inspeccion=$('#inspeccione').val();

// 	cadena= "id=" + idrev +
// 			"&tipo=" + tipo + 
// 			"&fecha=" + fecha +
// 			"&cedulapropietario=" + Cedulapropietario ;

// 	$.ajax({
// 		type:"POST",
// 		url:"crudrevisiones/editarevdb.php",
// 		data:cadena,
// 		success:function(r){
// 			if(r=="1"){
// 				$('#tabla').load('include/paginadorevdia.php');

// 				// Verificar el valor de r antes de mostrar la alerta
// 				alertify.alert("El registro se actualizo correctamente", function(){
// 					alertify.success('Datos Editados');
// 				});
// 			}else{
// 				alertify.error("Algo salio mal..." + " | "+ r);
// 			}
// 		}
// 	});

// }
