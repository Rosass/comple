<?php $session = session();?>

<div class="container-fluid">
    <div class="row pt-3">
		<div class="col-md-12">
			<div class="bg-color-tec-red p-3 rounded-top text-white small">
				INICIASTE SESIÓN COMO: <span class="font-weight-bold"> <?= $session->usuario_logueado->usuario?></span><br>
				NOMBRE USUARIO: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre_jefe . " " . $session->usuario_logueado->apaterno_jefe . " " . $session->usuario_logueado->amaterno_jefe?></span><br>
				ÁREA: <span class="font-weight-bold"> <?= $session->usuario_logueado->nombre_area ?></span>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
				<span class="navbar-brand text-wrap text-light" href="<?= base_url('admin/jefes') ?>" style="font-size:15px !important;"><img src="<?= base_url('public/img/logotec_blanco.png') ?>" alt="" style="max-width: 35px;"> Sistema de Gestión de Actividades Complementarias</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarText">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item <?= ($activo == 'jefes') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('admin/jefes') ?>">Jefes</a>
						</li>
						<li class="nav-item <?= ($activo == 'areas') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('admin/areas') ?>">Áreas</a>
						</li>
						<li class="nav-item <?= ($activo == 'tipos-usuarios') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('admin/tipos-usuarios') ?>">Tipos usuarios</a>
						  </li> 
						  <li class="nav-item <?= ($activo == 'usuarios') ? 'active' : '' ?>">
        					<a class="nav-link" href="<?= base_url('admin/usuarios') ?>"> Usuarios</a>
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