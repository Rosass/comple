(() => {
    if ( !document.getElementById('clave10') ) {
        return null;
    }
    document
    .getElementById('clave10')
    .addEventListener('input', function(evt) {
        const clave10 = evt.target,
            valido = document.getElementById('edita'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(clave10.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
    
    document
    .getElementById('confirmar_clave10')
    .addEventListener('input', function(evt) {
        const confirmar_clave10 = evt.target,
            valido = document.getElementById('edit'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(confirmar_clave10.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
})();
