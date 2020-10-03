// JavaScript para deshabilitar el envío de formularios si hay campos no válidos -> Obtenido de la documentación oficial de Bootstrap
(function ()
{
	'use strict';
	window.addEventListener('load', function ()
	{
		// Obtener todos los formularios a los que queremos aplicar estilos de validación personalizados de Bootstrap
		var forms = document.getElementsByClassName('needs-validation');
        const btnEnviarFormulario = document.querySelectorAll(".btnEnviarFormulario");
        const btnGuardar = document.getElementById("btnGuardar");

		// Bucle sobre los forms y evitar el envio del formulario
		var validation = Array.prototype.filter.call(forms, function (form)
		{
			form.addEventListener('submit', function (event)
			{
				// Si hay errores de validación se detiene el submit del form
				if (form.checkValidity() === false)
				{
					event.preventDefault();
					event.stopPropagation();
					form.classList.add('was-validated');
				}
				else // Si no hay errores se muestra el spinner y se deshabilita el boton submit para que no se reenvie el formulario
				{
					btnGuardar.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...`;
					btnGuardar.classList.add('disabled');
				}
			}, false);
		});

        // Se muestra el spinner y se deshabilita el boton submit para que no se reenvie el formulario
        btnEnviarFormulario.forEach(element => 
        {
            element.addEventListener("click", function()
            {
                element.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...`;
                element.classList.add('disabled');
            });
	    });
        
	}, false);
})();