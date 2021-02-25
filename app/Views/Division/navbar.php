<?php $session = session();?>

<div class="container-fluid">
    <div class="row pt-3">
		<div class="col-md-12">
			<div class="bg-color-tec-red p-3 rounded-top text-white small">
				INICIASTE SESIÓN COMO: <span class="font-weight-bold"> <?= $session->usuario_logueado->usuario?></span><br>
				NOMBRE USUARIO: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre_jefe . " " . $session->usuario_logueado->apaterno_jefe . " " . $session->usuario_logueado->amaterno_jefe?></span><br>
				ÁREA: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre_area ?></span>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom shadow-lg">
				<span class="navbar-brand text-wrap text-light" href="<?= base_url('division/inscripciones') ?>" style="font-size:15px !important;"><img src="<?= base_url('public/img/logotec_blanco.png') ?>" alt="" style="max-width: 30px;"> Sistema de Gestión de Actividades Complementarias</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarText">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item <?= ($activo == 'periodos') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('division/periodos') ?>">Periodos</a>
      					</li> 
						<li class="nav-item <?= ($activo == 'tipos-actividades') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('division/tipos-actividades') ?>">Tipos actividades</a>
      					</li> 
      					<li class="nav-item <?= ($activo == 'actividades') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('division/actividades') ?>">Actividades</a>
      					</li>
					<!-- 	<li class="nav-item <?= ($activo == 'responsables') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('division/responsables') ?>">Responsables</a>
      					</li> --> 
						<li class="nav-item <?= ($activo == 'inscripciones') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('division/inscripciones') ?>">Inscripciones</a>
      					</li>
						<li class="nav-item <?= ($activo == 'cambiar clave') ? 'active' : '' ?>">
        		    	<a class="nav-link" href="<?= base_url('division/cambiar-clave') ?>">Cambiar Clave</a>
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
	<a  href= "..\public\manuales\MANUAL MODULO DIVISION.pdf" target="_blank"><i class="fas fa-file-pdf"></i> MANUAL DE DIVISIÓN</a>
	</div>