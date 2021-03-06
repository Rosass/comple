<?php $session = session();?>
<div class="container-fluid">
    <div class="row pt-3">
		<div class="col-md-12">
			<div class="bg-color-tec-red p-3 rounded-top text-white small">
				INICIASTE SESIÓN COMO: <span class="font-weight-bold"> <?= $session->usuario_logueado->rfc_responsable?></span><br>
				NOMBRE USUARIO: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre . " " . $session->usuario_logueado->apaterno . " " . $session->usuario_logueado->amaterno?></span><br>
				
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom shadow-lg">
				<span class="navbar-brand text-wrap text-light" href="<?= base_url('responsables/inicio') ?>" style="font-size:15px !important;"><img src="<?= base_url('public/img/logotec_blanco.png') ?>" alt="" style="max-width: 30px;"> Sistema de Gestión de Actividades Complementarias</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarText">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item <?= ($activo == 'actividades') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('responsables/inicio') ?>">Inicio</a>
				</li> 
				<li class="nav-item <?= ($activo == 'cambiar clave') ? 'active' : '' ?>">
        		    <a class="nav-link" href="<?= base_url('responsables/cambiar-clave') ?>">Cambiar Clave</a>
      	        </li> 						
				</ul>
					<span class="navbar-text">
						<form action="<?= base_url("logout") ?>" method="POST">
							<button type="submit" class="dropdown-itembtn btn btn-danger text-white border-0" style="border-radius: 25px;"><i class="fas fa-power-off small"></i> Cerrar sesión</button>
						</form>
					</span>
				</div>
			</nav>
		</div>
	</div>
</div>
	<div class= "float-left pt-3 ml-5">
	<a  href= "..\public\manuales\MANUAL MODULO RESPONSABLE.pdf" target="_blank"><i class="fas fa-file-pdf"></i> MANUAL DE RESPONSABLE</a>
	</div>