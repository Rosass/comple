const inputNoControl = document.getElementById("inputNoControl");
const BASE_URL = "http://localhost/comple/";
const tbodyResult = document.getElementById("tbodyResult");


const datosAlimno = document.querySelector('#datos-alumno');
const formularioBuscarAalumno = document.querySelector('#formulario-buscar-alumno');

let promedioAlumno;


// FUNCIONES
const buscarAlumno = async (e) => {
	e.preventDefault();
	promedioAlumno = 0;

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
		${promedioAlumno < 5 ? '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-pdf"></i>Generar Constancia Parcial</button>' : '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examplesModal"> <i class="fas fa-file-pdf"> </i> Generar Constancia de Liberación</button>'} </P>
	`;
	datosAlimno.appendChild( divAlerta );
}
// IMRPIMIR DATOS DE ACTIVIDADES EN HTML 
const imprimirActividades = actividades => {
	limpiarHTML( tbodyResult );
	let index = 1;
	actividades.data.forEach( activ => {
		const tr = document.createElement('tr');
		const { credito, actividad, nombre, apaterno, amaterno, calificacion, horario, tipo_actividad, periodo, hora} = activ;
		promedioAlumno += Number(credito);
		tr.innerHTML = `
			<td>${ index }</td>
			<td>${ periodo }</td>
			<td>${ actividad }</td>
			<td>${tipo_actividad }</td>
			<td>${credito }</td>
			<td>${hora}</td>
			<td>${ horario }</td>
			<td>${ nombre } ${ apaterno} ${ amaterno }</td>
			<td>${ calificacion}</td>
		`;
		tbodyResult.appendChild( tr );
		index++;
	});
}


// HACER TETICION A ACTIVIDADcONTROLLER 
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

// Constancia parcial o liberacion
// const calcular

// EVENTO SUBMIT BUSCAR ALEMUNO
formularioBuscarAalumno.addEventListener('submit', buscarAlumno );