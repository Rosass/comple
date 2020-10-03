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
			<form action="<?= base_url("division/responsables/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
                        <i class="fas fa-pen"></i>  EDICIÓN DE RESPONSABLE
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nombre">NOMBRE (*)</label>
									<input type="text" class="form-control text-uppercase" name="nombre" required value="<?= $responsable->nombre ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="apaterno">APELLIDO PATERNO (*)</label>
									<input type="text" class="form-control text-uppercase" name="apaterno" required value="<?= $responsable->apaterno ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="amaterno">APELLIDO MATERNO (*)</label>
									<input type="text" class="form-control text-uppercase" name="amaterno" required value="<?= $responsable->amaterno ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="rfc">RFC (*)</label>
									<input type="text" class="form-control disabled" name="rfc" value="<?= $responsable->rfc_responsable ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="telefono">TELEFONO</label>
									<input type="number" class="form-control" name="telefono" value="<?= $responsable->telefono ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="correo">CORREO</label>
									<input type="email" class="form-control" name="correo" value="<?= $responsable->correo ?>">
								</div>
							</div>
						</div>
						<small>Los campos marcados con (*) son obligatorios.</small>
						<div class="text-center">
							<div class="dropdown-divider"></div>
							<a href="<?= base_url("division/responsables") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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
	<div class="row mt-5">
		<div class="col-md-12">
			<form action="<?= base_url("division/responsables/editar-clave") ?>" method="POST">
                <div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
                        <i class="fas fa-pen"></i>  ACTUALIZACIÓN DE CLAVE
					</div>
					<div class="card-body">
                        <div class="row">
                            <input type="hidden" class="form-control disabled" id="rfc" name="rfc" value="<?= $responsable->rfc_responsable ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clave">NUEVA CLAVE (*)</label>
                                    <input type="password" class="form-control" name="clave" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar_clave">REPETIR NUEVA CLAVE (*)</label>
                                    <input type="password" class="form-control"  name="confirmar_clave" required>
                                </div>
                            </div>
                        </div>
                        <small>Los campos marcados con (*) son obligatorios.</small>
                        <div class="text-center">
                            <div class="dropdown-divider"></div>
							<a href="<?= base_url("division/responsables") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                            <button type="submit" class="btn bg-color-tec-blue text-white btnEnviarFormulario"><i class="fas fa-check"></i> Guardar</button>
                        </div>
					</div>
				</div>
				
			</form>
		</div>
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