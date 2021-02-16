document
.getElementById('clave21')
.addEventListener('input', function(evt) {
    const clave21 = evt.target,
        valido = document.getElementById('camp'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(clave21.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});

document
.getElementById('confirmar_clave1')
.addEventListener('input', function(evt) {
    const confirmar_clave1 = evt.target,
        valido = document.getElementById('cam'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(confirmar_clave1.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});
