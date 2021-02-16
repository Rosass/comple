document
.getElementById('clave2110')
.addEventListener('input', function(evt) {
    const clave2110 = evt.target,
        valido = document.getElementById('clav'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(clave2110.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});

document
.getElementById('confirmar_clave2110')
.addEventListener('input', function(evt) {
    const confirmar_clave2110 = evt.target,
        valido = document.getElementById('conf'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(confirmar_clave2110.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});