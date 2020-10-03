<?php $session = session(); ?>
<div class="container text-center">
	<div class="row mt-5">
		<div class="col-md-12 ">
		    <!-- Mensajes de error -->
			<?php if($session->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
			<form action="<?= base_url("admin/jefes/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
                        <i class="fas fa-pen"></i>  EDICIÓN DE JEFE
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nombre_jefe">NOMBRE (*)</label>
									<input type="text" class="form-control text-uppercase" name="nombre_jefe" required value="<?= $jefe->nombre_jefe ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="apaterno_jefe">APELLIDO PATERNO (*)</label>
									<input type="text" class="form-control text-uppercase" name="apaterno_jefe" required value="<?= $jefe->apaterno_jefe ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="amaterno_jefe">APELLIDO MATERNO (*)</label>
									<input type="text" class="form-control text-uppercase" name="amaterno_jefe" required value="<?= $jefe->amaterno_jefe ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="rfc_jefe">RFC (*)</label>
									<input type="text" class="form-control disabled" name="rfc" value="<?= $jefe->rfc_jefe ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="telefono_jefe">TELEFONO</label>
									<input type="number" class="form-control" name="telefono_jefe" value="<?= $jefe->telefono_jefe ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="correo_jefe">CORREO</label>
									<input type="email" class="form-control" name="correo_jefe" value="<?= $jefe->correo_jefe ?>">
								</div>
							</div>
						</div>
						<small>Los campos marcados con (*) son obligatorios.</small>
						<div class="text-center">
							<div class="dropdown-divider"></div>
							<a href="<?= base_url("admin/jefes") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
							<button type="submit" class="btn bg-color-tec-blue text-white btnEnviarFormulario"><i class="fas fa-check"></i> Guardar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    <!-- Mensajes de error -->
	<?php if($session->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
	<?php endif ?>
	
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