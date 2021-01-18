<?php $session = session(); ?>
<div class="container text-center">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-9 ">
		    <!-- Mensajes de error -->
			<?php if($session->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
			<form action="<?= base_url("admin/tipos-usuarios/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
                        <i class="fas fa-pen"></i>  EDICIÓN DE TIPO USUARIO
					</div>
					<div class="card-body">
						<div class="row justify-content-center">
                            <input type="hidden" class="form-control disabled" id="id_tipo_usuario" name="id_tipo_usuario" value="<?= $tipo_usuario->id_tipo_usuario ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_tipo">NOMBRE DEL TIPO DE USUARIO(*)</label>
                                        <input type="text" class="form-control text-uppercase" id="nombre_tipo" name="nombre_tipo" required value="<?= $tipo_usuario->nombre_tipo ?>">
                                    </div>
                                </div>                                
						</div>
						
						<small>Los campos marcados con (*) son obligatorios.</small>
						<div class="text-center">
							<div class="dropdown-divider"></div>
							<a href="<?= base_url("admin/tipos-usuarios") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
							<button type="submit" class="btn bg-color-tec-blue text-white btnEnviarFormulario"><i class="fas fa-check"></i> Guardar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<script>
    const btnEnviarFormulario = document.querySelectorAll(".btnEnviarFormulario");

	btnEnviarFormulario.forEach(element => {
		element.addEventListener("click", function(){
            element.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...`;
            deshabilitarAcciones();
        });
	});

    function deshabilitarAcciones()
    {
        var botones = document.querySelectorAll('button');
        var inputs = document.querySelectorAll('input');
        var enlaces = document.querySelectorAll('a');

        for (var i=0; i< botones.length; i++) {
            inputs[i].setAttribute("readonly", true);
            botones[i].classList.add('disabled');
            enlaces[i].style.pointerEvents = 'none';
        }
    }
</script>