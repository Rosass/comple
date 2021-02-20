
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
        <!-- Mensajes satisfactorios -->
                <?php if($session->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $session->getFlashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif ?>
                <form action="<?= base_url("responsables/cambiar-clave/editar-clave") ?>" method="POST">
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
                                        <input type="password" class="form-control" name="clave" id="clave21109" required>
                                        <small id="msj1"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmar_clave">REPETIR NUEVA CLAVE (*)</label>
                                        <input type="password" class="form-control"  name="confirmar_clave" id="confirmar_clave21109" required>
                                        <small id="msj2"></small>
                                    </div>
                                </div>
                            </div>
                            <small>Los campos marcados con (*) son obligatorios.</small>
                            <div class="text-center">
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url("responsables/cambiar-clave") ?>" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
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