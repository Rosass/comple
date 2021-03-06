( () => {
    const selectActividadHTML = document.querySelector('#actividad3531');
    if ( !selectActividadHTML ) return;

    console.log('object');

    const selectPeriodoHTML = document.querySelector('#periodo3531');
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
	    data.append('id_periodo', periodo );


        try {
            const resp = await fetch( BASE_URL + 'division/inscripciones/actividad',{
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
    const agregarOptionSelect = async periodo  => {
        limpiarHTML( selectActividadHTML );
        selectActividadHTML.add( crearOption('', 'Buscando...'));
        const actividades = await consultaFetch( periodo  );

        if ( actividades.length <= 0 ) {
            limpiarHTML( selectActividadHTML );
            selectActividadHTML.add( crearOption('', 'No hay actividades'));
            return;
        }

        const options = actividades.map( ({ id_actividad, nombre_actividad }) => crearOption( id_actividad, nombre_actividad ));
        limpiarHTML( selectActividadHTML );
        options.forEach( option => {
            selectActividadHTML.add( option, null );
        });
    }

    //* EVENTOS
    selectPeriodoHTML.addEventListener('change', e => {
        const periodo = e.target.value;
        if ( periodo === '' ) return;
        agregarOptionSelect( periodo );
    });


})();