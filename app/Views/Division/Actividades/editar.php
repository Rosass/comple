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
			<form action="<?= base_url("division/actividades/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
						<i class="fas fa-pen"></i>  EDICIÓN DE ACTIVIDAD
					</div>
					<div class="card-body">
						<div class="row">
                            <input type="hidden" name="id_actividad" value="<?= $actividad->id_actividad ?>">
							<div class="col-md-12">
								<div class="form-group">
									<label for="nombre">NOMBRE (*)</label>
									<input type="text" class="form-control text-uppercase" id="nombre" name="nombre" required value="<?= $actividad->nombre_actividad ?>" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="dictamen">DICTAMEN (*)</label>
									<input type="text" class="form-control text-uppercase" id="dictamen" name="dictamen" required value="<?= $actividad->numero_dictamen ?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="creditos">NÚMERO DE CREDITOS (*)</label>
									<input type="text" class="form-control text-uppercase" id="creditos" name="creditos" required value="<?= $actividad->creditos ?>" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="capacidad">CAPACIDAD (*)</label>
									<input type="text" class="form-control text-uppercase" id="capacidad" name="capacidad" required value="<?= $actividad->capacidad ?>" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="horas">NÚMERO DE HORAS</label>
									<input type="number" class="form-control" id="horas" name="horas" value="<?= $actividad->horas ?>" min="0">
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="id_area">ÁREA (*)</label>
									<select class="custom-select" name="id_area" id="area2110" required>
										<?php foreach($area as $key => $area) : ?>
										    <option value="<?= $area->id_area ?>" <?= ($area->id_area == $actividad->id_area) ? 'selected' : '' ?>><?= $area->nombre_area ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="periodo">PERIODO (*)</label>
									<select class="custom-select" name="periodo" required>
										<?php foreach($periodo as $key => $periodo) : ?>
										    <option value="<?= $periodo->periodo ?>" <?= ($periodo->periodo == $actividad->periodo) ? 'selected' : '' ?>><?= $periodo->descripcion ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="id_tipo_actividad">TIPO (*)</label>
									<select class="custom-select" name="id_tipo_actividad" id="select-tipo2110" required>
										<?php foreach($tipos_actividades as $key => $tipo) : ?>
										<option value="<?= $tipo->id_tipo_actividad ?>" <?= ($tipo->id_tipo_actividad == $actividad->id_tipo_actividad) ? 'selected' : '' ?>><?= $tipo->nombre ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>	
						</div>
						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<label for="rfc_jefe_nofk">JEFE DE ÁREA</label>
									<select class="custom-select" name="rfc_jefe_nofk">
									<?php if($actividad->rfc_jefe_nofk == null) : ?>
                                        <option selected disabled>Elige un jefe</option>
										<?php endif ?>
                                        <?php foreach($jefe as $key => $jefe) : ?>
										    <option value="<?= $jefe->rfc_jefe ?>" <?= ($jefe->rfc_jefe == $actividad->rfc_jefe_nofk) ? 'selected' : '' ?>><?= $jefe->nombre_jefe . " " . $jefe->apaterno_jefe . " ". $jefe->amaterno_jefe . "" ?></option>
										<?php endforeach ?>>
									</select>
								</div>
							</div>	
							<div class="col-md-6">
								<div class="form-group">
									<label for="horario">HORARIO</label>
									<input type="horario" class="form-control text-uppercase" id="horario" name="horario" value="<?= $actividad->horario ?>">
									<small>Los horarios debes separarlos por punto y coma ';'.</small>
								</div>
							</div>
						
						</div>
						<small>Los campos marcados con (*) son obligatorios.</small>
                        <div class="text-center">
                            <div class="dropdown-divider"></div>
							<a href="<?= base_url("division/actividades") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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