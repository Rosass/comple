(() => {
	const escalaDePromedios = [
		{ promedio: 1.0, calificacion: 70},
		{ promedio: 1.1, calificacion: 71},
		{ promedio: 1.2, calificacion: 72},
		{ promedio: 1.3, calificacion: 73},
		{ promedio: 1.4, calificacion: 74},
		{ promedio: 1.5, calificacion: 75},
		{ promedio: 1.6, calificacion: 76},
		{ promedio: 1.7, calificacion: 77},
		{ promedio: 1.8, calificacion: 78},
		{ promedio: 1.9, calificacion: 79},
		{ promedio: 2.0, calificacion: 80},
		{ promedio: 2.1, calificacion: 81},
		{ promedio: 2.2, calificacion: 82},
		{ promedio: 2.3, calificacion: 83},
		{ promedio: 2.4, calificacion: 84},
		{ promedio: 2.5, calificacion: 85},
		{ promedio: 2.6, calificacion: 86},
		{ promedio: 2.7, calificacion: 87},
		{ promedio: 2.8, calificacion: 88},
		{ promedio: 2.9, calificacion: 89},
		{ promedio: 3.0, calificacion: 90},
		{ promedio: 3.1, calificacion: 91},
		{ promedio: 3.2, calificacion: 92},
		{ promedio: 3.3, calificacion: 93},
		{ promedio: 3.4, calificacion: 94},
		{ promedio: 3.5, calificacion: 95},
		{ promedio: 3.6, calificacion: 96},
		{ promedio: 3.7, calificacion: 97},
		{ promedio: 3.8, calificacion: 98},
		{ promedio: 3.9, calificacion: 99},
		{ promedio: 4.0, calificacion: 100},
	];
	const inputNoControl = document.getElementById("inputNoControl");
	const BASE_URL = "http://localhost/comple/";
	//const URL_BASE = 'https://ac.pochutla.tecnm.mx/';
	const tbodyResult = document.getElementById("tbodyResult");
	const tfoot = document.querySelector('#extra-info');


	const datosAlimno = document.querySelector('#datos-alumno');
	const formularioBuscarAalumno = document.querySelector('#formulario-buscar-alumno');
	if ( !formularioBuscarAalumno ) return;

	let promedioAlumno;
	let totalCalificacion;


	// FUNCIONES
	const buscarAlumno = async (e) => {
		e.preventDefault();
		promedioAlumno = 0; 
		totalCalificacion = 0; 

		if ( inputNoControl.value === '' ) {
			alertaError('Ingresa el numero de control del alumno...');
			limpiarHTML( datosAlimno );
			limpiarHTML( tbodyResult );
			return;
		}
		agregarSpinner();
		const data = new FormData();
		data.append('no_control', inputNoControl.value);
		const { alumno, actividades }= await consultaFetch( data );
		if ( document.querySelector('.spinner') ) {
			document.querySelector('.spinner').remove();
		}
		// primera validacion si no hay datos 
		if ( alumno.error) {
			limpiarHTML( datosAlimno );
			limpiarHTML( tbodyResult );
			alertaError('Alumno no encontrado ¡Intente nuevamente!');
		} else if ( !alumno.error && actividades.error ) {
			limpiarHTML( datosAlimno );
			limpiarHTML( tbodyResult );
			imprimirAlumno(alumno);
			alertaError('No se encontraron actividades');
		} else {
			imprimirActividades( actividades );
			imprimirAlumno(alumno);
		}
	}

	// Agregar spinner
	const agregarSpinner = () => {
		const spinner = document.createElement('div');
		spinner.classList.add('spinner', 'text-center', 'py-2');
		spinner.innerHTML = `
			<div class="sk-chase">
			<div class="sk-chase-dot"></div>
			<div class="sk-chase-dot"></div>
			<div class="sk-chase-dot"></div>
			<div class="sk-chase-dot"></div>
			<div class="sk-chase-dot"></div>
			<div class="sk-chase-dot"></div>
			</div>
		`;
		document.querySelector('#loading').appendChild( spinner );
	}

	// IMRPRIMIR DATOS DE ALUMNO
	const imprimirAlumno = alumno => {
		limpiarHTML( datosAlimno );
		const { nombre, ap_paterno, ap_materno, num_control, carrera } = alumno.data;
		const divAlerta = document.createElement('div');
		divAlerta.classList.add('alert', 'alert-success');
		divAlerta.innerHTML =  `
			<p>N° de Control: <span class="font-weight-bold">${ num_control}</span></p>
			<p>Nombre: <span class="font-weight-bold">${ nombre } ${ ap_paterno} ${ ap_materno }</span></p>
			<p>Carrera: <span class="font-weight-bold">${ carrera }</span></p>
			<p>Creditos: <span class="font-weight-bold">${ promedioAlumno }</span></p>
			<p>
		`;

		
		if ( promedioAlumno > 0 && promedioAlumno < 5 ) {
			divAlerta.appendChild( botonModal( num_control.trim(),  'Generar Constancia Parcial' ) );
			datosAlimno.appendChild( modal( num_control.trim(), 'escolares/generar-parcial' ) );
			validaCampos();
		} else if ( promedioAlumno >= 5 ) {
			divAlerta.appendChild( botonModal( num_control.trim(), 'Generar Constancia De Liberación' ) );
			datosAlimno.appendChild( modal( num_control.trim(), 'escolares/generar-liberacion' ) );
			validaCampos();
			
		}
		
		datosAlimno.appendChild( divAlerta );

		// eventoFormularioModal();
	}
	// IMRPIMIR DATOS DE ACTIVIDADES EN HTML 
	const imprimirActividades = actividades => {
		limpiarHTML( tbodyResult );
		limpiarHTML( tfoot );
		let index = 0;
		actividades.data.forEach( activ => {
			const tr = document.createElement('tr');
			const {
				credito,
				actividad,
				nombre,
				apaterno,
				amaterno,
				calificacion,
				horario,
				tipo_actividad,
				periodo_descripcion,
				hora
			} = activ;
			promedioAlumno += Number(credito);
			totalCalificacion += Number(calificacion);
			tr.innerHTML = `
				<td>${ ++index }</td>
				<td>${ periodo_descripcion }</td>
				<td>${ actividad }</td>
				<td>${tipo_actividad }</td>
				<td>${credito }</td>
				<td>${hora}</td>
				<td>${ horario }</td>
				<td>${ nombre } ${ apaterno} ${ amaterno }</td>
				<td>${ ( calificacion >= 1 ) ? calificacion : "" }</td>
			`;
			tbodyResult.appendChild( tr );
			// index++;
		});
		// totalCalificacion = totalCalificacion / index;

		if ( promedioAlumno >= 5 ) {
			const tr = document.createElement('tr');
			const promedioEscala = totalCalificacion / index ;
			let promedio = 0;
			escalaDePromedios.forEach( escala => {
				if ( escala.promedio.toString() === tratarNumeros( promedioEscala ) ) {
					promedio = escala.calificacion
				}
			});

			if ( promedioEscala < '1' ) {
				promedio = 'NA';
			}
			
			tr.innerHTML =  `
			<td></td><td></td><td></td><td></td><td></td><td>Valor Numerico:</td><td>${tratarNumeros( promedioEscala )}</td><td>Promedio aritmético: </td>
			<td>${ promedio }</td>
		`;
			tfoot.appendChild( tr );
		}

	}


	const tratarNumeros = numero => {
		return numero.toFixed(3).substring().slice(0, -2);
	}


	// HACER PETICION A ACTIVIDAD CONTROLLER 
	const consultaFetch = async (data) => {
		try {
			const resp = await fetch(BASE_URL + 'buscar',{
				method: "POST", 
				headers:{"X-Requested-With": "XMLHttpRequest"},
				body: data
			});
			return await resp.json();
		} catch (error) {
			console.log( error );
		}
	}


	const limpiarHTML = elemento => {
		while ( elemento.firstChild ) {
			elemento.removeChild( elemento.firstChild );
		}
	}

	const alertaError = mensaje => {
		if ( document.querySelector('.alerta-error') ) {
			document.querySelector('.alerta-error').remove();
		}
		const alertaError = document.createElement('div');
		alertaError.classList.add('alert', 'alert-danger', 'alerta-error', 'text-center', 'my-2', 'p-1');
		alertaError.textContent = mensaje;
		formularioBuscarAalumno.appendChild( alertaError );
		setTimeout(() => {
			alertaError.remove();
		}, 2000);
	} 

	// Scripting MODAL

	// Boton
	const botonModal = (noControl, texto ) => {
		const boton = document.createElement('button');
		boton.textContent = texto;
		boton.classList.add('btn', 'btn-primary');
		boton.setAttribute('type', 'button');
		boton.setAttribute('data-toggle', 'modal');
		boton.setAttribute('data-target',  `#xx-${noControl}`);
		console.log( boton );
		return boton;
	}

	// Modal
	const modal = ( noControl, ruta ) => {
		// Pimer  div
		const modal = document.createElement('div');
		modal.classList.add('modal', 'fade');
		modal.id = `xx-${noControl}`;
		modal.setAttribute('tabindex', '-1');
		modal.setAttribute('role', 'document');
		modal.setAttribute('aria-hidden', 'true');

		// Segundo div
		const modalDialog = document.createElement('div');
		modalDialog.classList.add('modal-dialog');
		modalDialog.setAttribute('role', 'dialog');
		// Tercer div
		const modalContent = document.createElement('div');
		modalContent.classList.add('modal-content');
		
		const formulario = document.createElement('form');
		formulario.id = 'formulario-modal';
		formulario.setAttribute('method', 'POST')
		formulario.setAttribute('action', BASE_URL + ruta);
		formulario.setAttribute('target', '_blank');

		// Header del modal
		const modalHeader = document.createElement('div');
		modalHeader.classList.add('modal-header');

		const tituloModal = document.createElement('h5');
		tituloModal.classList.add('modal-title');
		tituloModal.textContent = 'Constancia';
		modalHeader.appendChild( tituloModal );
		const botonCerrar = document.createElement('button');
		botonCerrar.classList.add('close');
		botonCerrar.setAttribute('type', 'button');
		botonCerrar.setAttribute('data-dismiss', 'modal');
		botonCerrar.setAttribute('aria-label', 'Close');
		botonCerrar.innerHTML = `<span aria-hidden="true">&times;</span>`;
		modalHeader.appendChild( botonCerrar );

		// BOdy del modal
		
		// Footer del modal
		const modalFooter = document.createElement('div');
		modalFooter.classList.add('modal-footer');
		const botonCancelar = document.createElement('button');
		botonCancelar.textContent = 'Cancelar';
		botonCancelar.classList.add('btn', 'btn-secondary');
		botonCancelar.setAttribute('type', 'button');
		botonCancelar.setAttribute('data-dismiss', 'modal');
		modalFooter.appendChild( botonCancelar );

		const botonAceptar = document.createElement('button');
		botonAceptar.textContent = 'Generar PDF';
		botonAceptar.classList.add('btn', 'btn-primary');
		botonAceptar.id = 'btn-generar-pdf'
		botonAceptar.setAttribute('type', 'submit');
		//botonAceptar.setAttribute('disabled', true);
		modalFooter.appendChild( botonAceptar );

		formulario.appendChild( modalHeader );
		formulario.appendChild( modalBody(noControl) );
		formulario.appendChild( modalFooter );
		modalContent.appendChild( formulario );
		modalDialog.appendChild( modalContent);
		modal.appendChild( modalDialog );

		return modal;
	}

	const validaCampos = () => {
		document.querySelector('#folio').addEventListener('blur', function() {
			if ( this.value !== '') {
				document.querySelector('#btn-generar-pdf').removeAttribute('disabled');
			}
			if ( this.value === '') {
				document.querySelector('#btn-generar-pdf').setAttribute('disabled', true);
			}
			
		})
	}

	const modalBody = ( noControl ) => {
		const modalBody = document.createElement('div');
		modalBody.classList.add('modal-body');
		

		const divControl = document.createElement('div');
		divControl.classList.add('form-group');
		const labelControl = label('* N° control', 'control');
		const inputControl = input('control', 'control', true, '', noControl);
		divControl.appendChild( labelControl );
		divControl.appendChild( inputControl );
		modalBody.appendChild( divControl );

		const divFolio = document.createElement('div');
		divFolio.classList.add('form-group');
		const labelFolio = label('* Agrega el folio', 'folio');
		const inputFolio = input('folio', 'folio', false, 'FOLIO AQUI..');
		divFolio.appendChild( labelFolio );
		divFolio.appendChild( inputFolio );
		modalBody.appendChild( divFolio );

		return modalBody;
	}

	const label = (texto, f ) => {
		const label = document.createElement('label');
		label.setAttribute('for', f );
		label.textContent = texto;
		return label;
	}
	const input = (id, name, status, placeholder, noControl) => {
		const input = document.createElement('input');
		input.classList.add('form-control');
		input.id = id;
		input.setAttribute('type', 'text' );
		input.setAttribute('name', name );
		(noControl) && input.setAttribute('value', noControl );
		(status) &&  input.setAttribute('readonly', status );
		input.setAttribute('placeholder',placeholder);
		return input;
	}


	// EVENTO SUBMIT BUSCAR ALEMUNO
	formularioBuscarAalumno.addEventListener('submit', buscarAlumno );

})();