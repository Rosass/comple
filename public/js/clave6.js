(() => {
    if ( !document.getElementById('clave211098') ) {
        return null;
    }
    document
    .getElementById('clave211098')
    .addEventListener('input', function(evt) {
        const clave211098 = evt.target,
            valido = document.getElementById('msj3'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(clave211098.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
    
    document
    .getElementById('confirmar_clave211098')
    .addEventListener('input', function(evt) {
        const confirmar_clave211098 = evt.target,
            valido = document.getElementById('msj4'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(confirmar_clave211098.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
})();

