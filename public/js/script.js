$(document).ready(function(){

	// DECLARACIÓN DE VARIABLES
	const URL_BASE = 'https://ac.pochutla.tecnm.mx/';
	const selectActividad = document.getElementById('selectActividad');
	const tbodyTablaInscripciones = document.getElementById('tbodyTablaInscripciones');
	
	
    const traduccion_datatable_esp = {
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		}
		
    };
    
    // Se asigna el idioma español al plugin Datatables
    $('#tablaActividades, #tablaInscripciones, #tablaPeriodos, #tablaTiposActividades, #tablaResponsables, #tablaJefes, #tablaAreas, #tablaTiposUsuarios, #tablaUsuarios').DataTable({ "language": traduccion_datatable_esp });
	
	// Listener para filtrar las inscripciones por actividad mediante fetch
    selectActividad.addEventListener('change', (event) =>{
		const data = new FormData();
		data.append('id_actividad', event.target.value);

		// Se limpia la tabla
		$('#tablaInscripciones').DataTable().clear().destroy();

		// Se añade el spinner de cargando
		tbodyTablaInscripciones.innerHTML = 
		`<tr>
			<td colspan="9">
			<div class="text-center"><div class="spinner-border text-primary" role="status"></div></div>
			</td>
        </tr>`;
        // Se hace la consulta al servidor mediante Fetch
		fetch(URL_BASE + 'division/inscripciones',{method: "POST", headers:{"X-Requested-With": "XMLHttpRequest"}, body: data})
		.then(function (response)
		{
			if (response.ok) return response.json();
			else throw "Woops, Algo salio mal!";
		})
		.then(function (data)
		{
			// Se añaden los nuevos datos a la tabla
			tbodyTablaInscripciones.innerHTML = data;
			
			// Se vuelve a asignar el plugin "Datatables" para que vuelva a paginar
			$('#tablaInscripciones').DataTable({ "language": traduccion_datatable_esp });
		})
		.catch(error => console.log(error));
	});

	
})

