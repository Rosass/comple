document
.getElementById('clave')
.addEventListener('input', function(evt) {
    const clave = evt.target,
        valido = document.getElementById('campoOK'),
        
        regex = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;

    //Se muestra un texto válido/inválido a modo de ejemplo
    if (regex.test(clave.value)) {
    valido.innerText = "válido";
    } else {
    valido.innerText = "incorrecto";
    }
});