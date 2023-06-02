$(document).ready(function() {
	$('#guardar').click(function() {
		agregar();
	});
	$('#update').click(function() {
		update();
	});
});

///Funcion para agregar
function agregar() {
	// Obtener los valores del formulario
	var formulario = $('#myForm').serialize(); // Obtener los datos del formulario

	$.ajax({
		type:"POST",
		url:"crudpropietarios/agregarprodb.php",
		data:formulario,
		success:function(r){
			if(r=="1"){
				$('#loadtabla').load('include/pagpropietarios.php');
				// Verificar el valor de r antes de mostrar la alerta
				alertify.alert("El registro se guardo correctamente", function(){
					alertify.success('Datos agregados');
				});
			}else{
				alertify.error("Algo salio mal..." + " | "+ r);
			}
		}
	});
}

///Funcion para mostrar en el modal
function agregaform(datos){
	d=datos.split('||');
	$('#cedulas').val(d[0]);
	$('#nombres').val(d[1]);
	$('#direcciones').val(d[2]);
	$('#notass').val(d[3]);	
}
///Funcion para editar
function update(){
	var formulario = $('#myFormedit').serialize(); // Obtener los datos del formulario

	$.ajax({
		type:"POST",
		url:"crudpropietarios/editarpropdb.php",
		data:formulario,
		success:function(r){
			if(r=="1"){
				$('#loadtabla').load('include/pagpropietarios.php');

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
			url:"crudpropietarios/eliminar.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#loadtabla').load('include/pagpropietarios.php');
					alertify.success("El registro se elimino correctamente!");
				}else{
					alertify.error("Algo salio mal en el proceso:(");
				}
			}
		});
}