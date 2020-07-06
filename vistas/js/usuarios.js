var tabla;

//esta funcion se ejecuta al inicio
function init() {
	listar();
	//para guardar o editar
	$("#usuario_form").on("submit",function(e){
		guardaryeditar(e);
	})

	//la ventana modal
	$("#add_button").click(function(){
		$(".modal-title").text("Agregar usuario");
	});
	
}

//function para limpiar campos
function limpiar(){
	$("#nombre").val("");
	$("#apellidos").val("");
	$("#telefono").val("");
	$("#correo").val("");
	$("#usuario").val("");
	$("#password").val("");
	$("#id_usuario").val("");
}
//funcion listar
function  listar(){
	tabla=$('#usuario_data').dataTable({
		"aProcessing": true,//Activamos el procesamiento del datatables
		"aServerSide": true,//Paginacio y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [ //formas de exportar
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
		],
		"ajax":
		{
			url: '../ajax/usuario.php?op=listar',
			type: "get",
			dataType: "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//por cada 10 registros hace una paginacion
		"order": [[0, "desc"]], //ordenar (columna,orden)
		  "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language
	}).DataTable();
}

 function guardaryeditar(e){
 	e.preventDefault();
 	var formData = new FormData($("#usuario_form")[0]);

 	var password1 = $("#password1").val();
 	var password2 = $("#password2").val();

 	//si el password coincide se envia el formulario

 	if (password1 == password2) {
 		$.ajax({
 			url: "../ajax/usuario.php?op=guardaryeditar",
 			type: "POST",
 			data: formData,
 			contentType: false,
 			processData: false,
 			success: function(datos){
 				console.log(datos);
 				$('#usuario_form')[0].reset();
 				$('#usuarioModal').modal('hide');

 				$('#resultados_ajax').html(datos);
 				$('#usuario_data').DataTable().ajax.reload();
 				limpiar(); 
 			}
 		});
 	}
 	else
 	{
 		bootbox.alert("No coincide el password");
 	}

 }


init();