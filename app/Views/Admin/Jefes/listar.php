<?php $session = session(); ?>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12">
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
			<div class="text-right">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevoJefeModal">
				    <i class="fas fa-plus"></i> Nuevo jefe
				</button>
			</div>
			<div class="table-responsive-sm text-center">
			<table class="table table-hover table-light table-striped shadow-lg" id="tablaJefes">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
						<tr>
							<th scope="col" colspan="13" class="border-top-0">
								<h3 class="mb-0 p-3">LISTA DE JEFES</h3>
							</th>
						</tr>
						<tr>
							<th scope="col" class="border-top-0">#</th>
							<th scope="col" class="border-top-0">RFC</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">APATERNO</th>
                            <th scope="col" class="border-top-0">AMATERNO</th>
							<th scope="col" class="border-top-0">TELÉFONO</th>
							<th scope="col" class="border-top-0">CORREO</th>
							<th scope="col" class="border-top-0">ESTATUS</th>
							<th scope="col" class="border-top-0"></th>
						</tr>
					</thead>
					<tbody class="text-center table-sm">
						<?php foreach($jefes as $key => $jefe) : ?>
						<tr>
							<th scope="row"><?= $key + 1 ?></th>
							<td><?= $jefe->rfc_jefe ?></td>
							<td><?= $jefe->nombre_jefe ?></td>
                            <td><?= $jefe->apaterno_jefe ?></td>
                            <td><?= $jefe->amaterno_jefe ?></td>
							<td><?= $jefe->telefono_jefe ?></td>
							<td><?= $jefe->correo_jefe ?></td>						
							<td>
								<?php if($jefe->estatus == true) : ?>
								    <span class="bg-success p-1 rounded small text-white">Activo</span>
								<?php else : ?>
								    <span class="bg-danger p-1 rounded small text-white">Inactivo</span>
								<?php endif ?>
							</td>
							<td style="width:12%;">
								<div class="d-flex flex-column">
								  	<!--  Editar jefe-->
									<a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("admin/jefes/editar/".$jefe->rfc_jefe) ?>"><i class="fas fa-pen"></i> Editar</a>
									<?php if($jefe->estatus == true) : ?>
									    <form action="<?= base_url('admin/jefes/cambiar-estatus') ?>" method="POST">
											<input type="hidden" name="rfc" value="<?= $jefe->rfc_jefe ?>">
											<button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
										</form>
									<?php else : ?>
										<form action="<?= base_url('admin/jefes/cambiar-estatus') ?>" method="POST">
											<input type="hidden" name="rfc" value="<?= $jefe->rfc_jefe ?>">
											<button type="submit" class="btn btn-success btn-sm btn-block btnEnviarFormulario"><i class="fas fa-check"></i> Habilitar</button>
										</form>
									<?php endif ?>
								</div>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Agregar Jefe-->
<?= view("admin/jefes/agregar"); ?>