<?php $session = session(); ?>
<div class="container text-center">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-6">
		    <!-- Mensajes de error -->
			<?php if($session->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
            <form action="<?= base_url("division/periodos/editar") ?>" method="POST">
                <div class="card border-0 shadow-lg">
					<div class="card-header bg-color-tec-blue text-white">
                        <i class="fas fa-pen"></i>  EDICIÓN DE PERIODO
					</div>
					<div class="card-body">
                        <div class="form-group">
                            <label for="nombre">PERIODO (*)</label>
                            <?php if($periodo->periodo == ENE_JUN) : ?>
                                <?php $descripcion = "ENE-JUN/".date('Y'); ?>
                            <?php elseif($periodo->periodo == VERANO) : ?>
                                <?php $descripcion = "VERANO/".date('Y'); ?>
                            <?php else : ?> 
                                <?php $descripcion = "AGO-DIC/".date('Y'); ?>
                            <?php endif ?>
                            <input type="text" class="form-control" value="<?= $periodo->periodo . " - " . $descripcion ?>"  readonly>
                            <input type="hidden" name="periodo" id="periodo" value="<?= $periodo->periodo ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">FECHA DE INICIO (*)</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required value="<?= $periodo->fecha_inicio ?>">
                        </div>
                        <div class="form-group">
                            <label for="fecha_final">FECHA FINAL (*)</label>
                            <input type="date" name="fecha_final" id="fecha_final" class="form-control" required value="<?= $periodo->fecha_final ?>">
                        </div>
                        <small class="text-center">Los campos marcados con (*) son obligatorios.</small>
                        <div class="text-center">
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url("division/tipos-actividades") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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