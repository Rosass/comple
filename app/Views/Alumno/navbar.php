<?php $session = session();?>

<div class="container-fluid">
    <div class="row pt-3">
		<div class="col-md-12">
			<div class="bg-color-tec-red p-3 rounded-top text-white small">
				NO. CONTROL: <span class="font-weight-bold"> <?= $session->usuario_logueado->num_control?></span><br>
				ALUMNO: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre . " " . $session->usuario_logueado->ap_paterno . " " . $session->usuario_logueado->ap_materno?></span><br>
				CARRERA: <span class="font-weight-bold"> <?= $session->usuario_logueado->carrera?></span><br>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-bottom shadow-lg">
				<a class="navbar-brand text-wrap text-light" href="<?= base_url('alumno/inicio') ?>" style="font-size:15px !important;"><img src="<?= base_url('public/img/logotec_blanco.png') ?>" alt="" style="max-width: 30px;"> Sistema de Gestión de Actividades Complementarias</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarText">
					<ul class="navbar-nav mr-auto">
					<li class="nav-item <?= ($activo == 'actividades') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('alumno/inicio') ?>">Actividades</a>
						  </li> 
						  <li class="nav-item <?= ($activo == 'Historial') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('alumno/historial') ?>">Historial</a>
						  </li> 
						  <li class="nav-item <?= ($activo == 'inscripciones') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('alumno/inscripciones') ?>">Inscripcion</a>
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