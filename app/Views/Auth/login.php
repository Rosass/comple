<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6">
            <form method="post" action="<?= base_url('login') ?>" class="bg-light pr-4 pl-4 pt-5 pb-5 rounded border shadow-lg">
                <?php $session = session(); if($session->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $session->getFlashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <div class="text-center pb-1">
                    <img src="<?= base_url('public/img/logotec.png') ?>" alt="" style="max-width: 100px;">
                </div>
                <div class="text-center">
                    <p class="h4">Inicio de sesión</p>
                    <div class="dropdown-divider"></div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
                    </div>
                    <input type="text" class="form-control" id="usuario" placeholder="USUARIO" name="usuario" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <input type="password" class="form-control" id="clave" placeholder="CLAVE" name="clave" required>
                </div>
                <button type="submit" class="btn bg-color-tec-blue btn-lg btn-block text-white btnEnviarFormulario">Iniciar sesión <i class="far fa-arrow-alt-circle-right small"></i></button>
                <div class="form-group text-center mt-4 mb-0">
                    <a href="<?= base_url('/') ?>" class="text-muted text-decoration-none"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const btnEnviarFormulario = document.querySelectorAll(".btnEnviarFormulario");

	btnEnviarFormulario.forEach(element => {
		element.addEventListener("click", function(){
            element.innerHTML = `<span class="spinner-border" role="status" aria-hidden="true"></span> Iniciando...`;
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