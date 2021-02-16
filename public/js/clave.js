document
.getElementById('clave1')
.addEventListener('input', function(evt) {
    const clave1 = evt.target,
        valido = document.getElementById('campoOK'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(clave1.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});

document
.getElementById('confirmar_clave')
.addEventListener('input', function(evt) {
    const confirmar_clave = evt.target,
        valido = document.getElementById('campo'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(confirmar_clave.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});
