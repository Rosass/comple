const inputNoControl = document.getElementById("inputNoControl");
const btnBuscar = document.getElementById("btnBuscar");
const BASE_URL = "http://localhost/comple/";
const tbodyResult = document.getElementById("tbodyResult");


const datosAlimno = document.querySelector('#datos-alumno');
const formularioBuscarAalumno = document.querySelector('#formulario-buscar-alumno');


btnBuscar.addEventListener("click", async () => {
	
	const data = new FormData();
	data.append('no_control', inputNoControl.value);

	try {
		const resp = await fetch(BASE_URL + 'buscar',{
				method: "POST", 
				headers:{"X-Requested-With": "XMLHttpRequest"},
				body: data
			});
		const  { alumno, actividades }= await resp.json();
		const { nombre, ap_paterno, ap_materno, num_control, carrera } = alumno.data;
		// const { }
		console.log( alumno );
		console.log( actividades );
	
		const divAlerta = document.createElement('div');
		divAlerta.classList.add('alert', 'alert-success');
		divAlerta.innerHTML =  `
			<p>${ num_control}</p>
			<p>${ nombre } ${ ap_paterno} ${ ap_materno }</p>
			<p>${ carrera }</p>
		`;
		datosAlimno.appendChild( divAlerta );

		// const HTML = '';
		actividades.data.forEach( (activ, index) => {
			const tr = document.createElement('tr');
			const { actividad, nombre, apaterno, amaterno, calificacion, horario, tipo_actividad, periodo, hora} = activ;
			tr.innerHTML = `
				<td>${ index }</td>
				<td>${ periodo }</td>
				<td>${ actividad }</td>
				<td>${tipo_actividad }</td>
				<td>${hora}</td>
				<td>${ horario }</td>
				<td>${ nombre } ${ apaterno} ${ amaterno }</td>
				<td>${ calificacion}</td>
			`;
			tbodyResult.appendChild( tr );
		});


	} catch (error) {
		console.log( error );
	}

});



// FUNCIONES
const buscarAlumno = e => {
	e.preventDefault();

	console.log( inputNoControl.value );

	if ( inputNoControl.value === '' ) {
		console.log('error');
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

// EVENTO SUBMIT BUSCAR ALEMUNO
formularioBuscarAalumno.addEventListener('submit', buscarAlumno );