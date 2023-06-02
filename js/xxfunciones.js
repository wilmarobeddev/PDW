
///Funcion para agregar
function agregar(cedula,nombre,direccion,notas){

	cadena="cedula=" + cedula + "&nombre=" + nombre + "&direccion=" + direccion + "&notas=" + notas;


	$.ajax({
		type:"POST",
		url:"../includes/agregar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('../views/tabla.php');
	
				alertify.alert("El registro se guardo correctamente", function(){
					alertify.success('Datos agregados');
				});
			}else{
				alertify.error("Algo salio mal en el proceso :(");
			}
		}
	});

}

///Funcion para mostrar en el modal
function agregaform(datos){

	d=datos.split('||');

	$('#ids').val(d[0]);
	$('#nombres').val(d[1]);
	$('#correos').val(d[2]);
	$('#passwords').val(d[3]);

	
}

///Funcion para editar
function update(){


	id=$('#ids').val();
	nombre=$('#nombres').val();
	correo=$('#correos').val();
	password=$('#passwords').val();


	cadena= "id=" + id +
			"&nombre=" + nombre + 
			"&correo=" + correo +
			"&password=" + password ;

	$.ajax({
		type:"POST",
		url:"../includes/editar.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('../views/tabla.php');
				alertify.alert("El registro se actualizo correctamente ", function(){
					alertify.success('Datos Editados');
				});
			}else{
				alertify.error("Algo salio mal en el proceso:(");
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
			url:"../includes/eliminar.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('../views/tabla.php');
					alertify.success("El registro se elimino correctamente!");
				}else{
					alertify.error("Algo salio mal en el proceso:(");
				}
			}
		});
}