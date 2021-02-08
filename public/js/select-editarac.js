
// $routes->post('division/inscripciones/actividad', 'Division/InscripcionController::get_actividades_periodo');
( () => {
    const selectActividadHTML = document.querySelector('#select-tipo2110');
    if ( !selectActividadHTML ) return;

    const selectPeriodoHTML = document.querySelector('#area2110');
    const BASE_URL = "http://localhost/comple/";
    //const URL_BASE = 'https://ac.pochutla.tecnm.mx/';

    //* LIMPIAR HTML ANTES DE INSERTAR
    const limpiarHTML = elemento => {
        while ( elemento.firstChild ) {
            elemento.removeChild( elemento.firstChild );
        }
    }

    const consultaFetch = async ( periodo ) => {

        const data = new FormData();
	    data.append('id_area', periodo );


        try {
            const resp = await fetch( BASE_URL + 'division/actividades/actividad',{
                method: "POST",
                headers:{"X-Requested-With": "XMLHttpRequest"},
                body: data
            });
            return await resp.json();
        } catch (error) {
            console.log( error );
        }
    }


    // Crear option
    const crearOption = ( value, text ) => {
        const option = document.createElement('option');
        option.setAttribute( 'value', value );
        option.textContent = text;
        return option;
    }

    // Agregar las actividades al option e insertar al select
    const agregarOptionSelect = async id_area  => {
        limpiarHTML( selectActividadHTML );
        selectActividadHTML.add( crearOption('', 'Buscando...'));
        const actividades = await consultaFetch( id_area  );

        if ( actividades.length <= 0 ) {
            selectActividadHTML.add( crearOption('', 'No hay actividades'));
            return;
        }

        const options = actividades.map( ({ id_tipo_actividad, nombre }) => crearOption( id_tipo_actividad, nombre ));
        limpiarHTML( selectActividadHTML );
        options.forEach( option => {
            selectActividadHTML.add( option, null );
        });
    }

    //* EVENTOS
    selectPeriodoHTML.addEventListener('change', e => {
        const id_area = e.target.value;
        if ( id_area === '' ) return;
        agregarOptionSelect( id_area );
    });


})();
