(() => {
    if ( !document.getElementById('clave21109') ) {
        return null;
    }
    document
    .getElementById('clave21109')
    .addEventListener('input', function(evt) {
        const clave21109 = evt.target,
            valido = document.getElementById('msj1'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(clave21109.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
    
    document
    .getElementById('confirmar_clave21109')
    .addEventListener('input', function(evt) {
        const confirmar_clave21109 = evt.target,
            valido = document.getElementById('msj2'),
            
            regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;
    
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(confirmar_clave21109.value)) {
        valido.innerText = "válido";
        } else {
        valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
        }
    });
})();


