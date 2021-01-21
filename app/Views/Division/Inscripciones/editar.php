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
			<form action="<?= base_url("division/inscripciones/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
						<i class="fas fa-pen"></i>  EDICIÓN DE INSCRIPCIÓN
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="num_control">NO CONTROL (*)</label>
                                    <input type="hidden" name="id_inscripcion" value="<?= $inscripcion->id_inscripcion ?>">
                                    <input type="number" class="form-control text-uppercase" id="num_control" name="num_control" required value="<?= $inscripcion->num_control ?>" required readonly>
                                </div>
                            </div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="periodo">PERIODO (*)</label>
									<select class="custom-select" name="periodo" required>
										<?php foreach($periodos as $key => $periodo) : ?>
										    <option value="<?= $periodo->periodo ?>" <?= ($periodo->periodo == $inscripcion->periodo) ? 'selected' : '' ?>><?= $periodo->descripcion ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="id_actividad">ACTIVIDAD (*)</label>
									<select class="custom-select" name="id_actividad" required>
										<?php foreach($actividades as $key => $actividad) : ?>
										    <option value="<?= $actividad->id_actividad ?>" <?= ($actividad->id_actividad == $inscripcion->id_actividad) ? 'selected' : '' ?>><?= $actividad->nombre_actividad ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="telefono">TELEFONO</label>
									<input type="number" class="form-control" name="telefono" value="<?= $inscripcion->telefono ?>">
								</div>
							</div>
						</div>
					
						<small>Los campos marcados con (*) son obligatorios.</small>
                        <div class="text-center">
                            <div class="dropdown-divider"></div>
							<a href="<?= base_url("division/inscripciones") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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