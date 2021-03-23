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
				<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevoResponsableModal">
				<i class="fas fa-plus"></i> Nuevo responsable
				</button>
			</div>
<!-- 			<form method="get" action="<?= base_url("jefes/responsables/periodo") ?>">
                    <div class="row mb-3 mt-2 justify-content-end">
                            <div class="col-md-5 text-right d-flex align-items-center">
							<span class="mr-1">Filtro </span>
                                <div class="input-group">
                                    <select class="custom-select"  name="periodo">
                                        <option selected disabled value="">Elige el periodo</option>
                                        <option value="0">PERIODO ACTIVO</option>
                                        <?php foreach($periodos as $key => $periodo) : ?>
                                            <option value="<?= $periodo->periodo ?>"><?= $periodo->descripcion ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <button type="submit"  class="btn bg-color-tec-blue text-white">Buscar</button>
                                </div>
                            </div>  
                    </div>
            </form> -->
			<div class="table-responsive-sm text-center">
				<table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
					<thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
						<tr>
							<th scope="col" colspan="13" class="border-top-0">
								<h3 class="mb-0 p-3">LISTA DE RESPONSABLES</h3>
							</th>
						</tr>
						<tr>
							<th scope="col" class="border-top-0">#</th>
							<th scope="col" class="border-top-0">PERIODO</th>
							<th scope="col" class="border-top-0">RFC</th>
							<th scope="col" class="border-top-0">NOMBRE</th>
							<th scope="col" class="border-top-0">TELÉFONO</th>
							<th scope="col" class="border-top-0">CORREO</th>
							<th scope="col" class="border-top-0">FECHA REGISTRO</th>
							<th scope="col" class="border-top-0">ESTATUS</th>
							<th scope="col" class="border-top-0">ACCION</th>
						</tr>
					</thead>
					<tbody class="text-center table-sm">
						<?php foreach($responsables as $key => $responsable) : ?>
						<tr>
							<th scope="row"><?= $key + 1 ?></th>
							<td><?= $responsable->periodo ?></td>
							<td><?= $responsable->rfc_responsable ?></td>
							<td><?= mb_strtoupper($responsable->nombre . " " . $responsable->apaterno . " " . $responsable->amaterno,'utf-8'); ?></td> 
							<td><?= $responsable->telefono  ?></td>
							<td><?= $responsable->correo ?></td>
							<td><?= $responsable->fecha_registro?></td>
							<td class="text-white">
								<?php if($responsable->estatus == true) : ?>
								<span class="bg-success p-1 rounded small">Activo</span>
								<?php else : ?>
								<span class="bg-danger p-1 rounded small">Inactivo</span>
								<?php endif ?>
							</td>
							<td style="width:12%;">
								<div class="d-flex flex-column">
									<!--  Editar responsable-->
									<a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("jefes/responsables/editar/".$responsable->rfc_responsable) ?>"><i class="fas fa-pen"></i> Editar</a>
									<?php if($responsable->estatus == true) : ?>
									<form action="<?= base_url('jefes/responsables/cambiar-estatus') ?>" method="POST">
											<input type="hidden" name="rfc" value="<?= $responsable->rfc_responsable ?>">
											<button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
										</form>
									<?php else : ?>
										<form action="<?= base_url('jefes/responsables/cambiar-estatus') ?>" method="POST">
											<input type="hidden" name="rfc" value="<?= $responsable->rfc_responsable ?>">
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

<!-- Modal Agregar Responsable-->
<?= view("Jefes/Responsables/agregar"); ?>