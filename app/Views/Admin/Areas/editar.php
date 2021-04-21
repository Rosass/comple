<?php $session = session(); ?>
<div class="container text-center justify-content-center">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-9 ">
		     <!-- Mensajes de error -->
			<?php if($session->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
			<form action="<?= base_url("admin/areas/editar") ?>" method="POST">
				<div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
						<i class="fas fa-pen"></i>  EDICIÓN DE AREA
					</div>
					<div class="card-body">
					<div class="row justify-content-center">
                            <input type="hidden" name="id_area" value="<?= $area->id_area ?>">
							<div class="col-md-9">
								<div class="form-group">
									<label for="nombre">NOMBRE (*)</label>
									<input type="text" class="form-control text-uppercase" id="nombre" name="nombre_area" required value="<?= $area->nombre_area ?>" required>
								</div>
							</div>
						</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-7">
								<div class="form-group">
									<label for="telefono">JEFE</label>
									<select class="custom-select" name="rfc_jefe">
                                        <?php if($area->rfc_jefe == null) : ?>
                                            <option selected disabled>Elige un jefe</option>
                                        <?php endif ?>
                                        <?php foreach($jefes as $key => $jefe) : ?>
										    <option value="<?= $jefe->rfc_jefe ?>" <?= ($jefe->rfc_jefe == $area->rfc_jefe) ? 'selected' : '' ?>><?= $jefe->nombre_jefe . " " . $jefe->apaterno_jefe . " ". $jefe->amaterno_jefe . "" ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-7">
								<div class="form-group">
									<label for="id">TIPO DEPARTAMENTO</label>
									<select class="custom-select" name="id">
                                        <?php if($area->id == null) : ?>
                                            <option selected disabled>Elige un tipo</option>
                                        <?php endif ?>
                                        <?php foreach($tipo_departamento as $key => $tipo) : ?>
										    <option value="<?= $tipo->id ?>" <?= ($tipo->id == $area->id) ? 'selected' : '' ?>><?= $tipo->tipo_departamento ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<small>Los campos marcados con (*) son obligatorios.</small>
                        <div class="text-center">
                            <div class="dropdown-divider"></div>
							<a href="<?= base_url("admin/areas") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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