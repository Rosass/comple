document
.getElementById('clave210')
.addEventListener('input', function(evt) {
    const clave210 = evt.target,
        valido = document.getElementById('edi'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(clave210.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});

document
.getElementById('confirmar_clave210')
.addEventListener('input', function(evt) {
    const confirmar_clave210 = evt.target,
        valido = document.getElementById('ed'),
        
        regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[0-9].*[!@#$%&*]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(confirmar_clave210.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "Debe tener al menos una  minúscula, una mayúscula, un número y un simbolo";
    }
});