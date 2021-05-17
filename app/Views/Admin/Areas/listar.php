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
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevoAreaModal"><i class="fas fa-plus"></i> Nueva Área</button>
            </div>
            <div class="table-responsive-sm text-center">
			<table class="table table-hover table-light table-striped shadow-lg" id="tablaAreas">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-3"><h3 class="mb-0">ÁREAS</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">NOMBRE JEFE</th>
                            <th scope="col" class="border-top-0">TIPO DE DEPARTAMENTO</th>
                            <th scope="col" class="border-top-0">FOLIO</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            <th scope="col" class="border-top-0">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($areas as $key => $area) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $area->nombre_area ?></td>
                                <td><?= $area->nombre_jefe. " " .$area->apaterno_jefe. " " .$area->amaterno_jefe ?></td>
                                <td><?= $area->tipo_departamento ?></td>
                                <td><?= $area->folio ?></td>
                                <td>
                                    <?php if($area->estatus == true) : ?>
                                        <span class="bg-success p-1 rounded small text-white">Activo</span>
                                    <?php else : ?>
                                        <span class="bg-danger p-1 rounded small text-white">Inactivo</span>
                                    <?php endif ?>
							    </td>
                                <td style="width:12%;">
                                    <div class="d-flex flex-column">
                                        <!--  Editar tipo-->
                                        <a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("admin/areas/editar/".$area->id_area) ?>"><i class="fas fa-pen"></i> Editar</a>
                                        <?php if ( $area->nombre_area !== 'ADMINISTRADOR' ):?>
                                        <?php if($area->estatus == true) : ?>
                                            <form action="<?= base_url('admin/areas/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="id_area" value="<?= $area->id_area ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
                                            </form>
                                        <?php else : ?>
                                            <form action="<?= base_url('admin/areas/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="id_area" value="<?= $area->id_area ?>">
                                                <button type="submit" class="btn btn-success btn-sm btn-block btnEnviarFormulario"><i class="fas fa-check"></i> Habilitar</button>
                                            </form>
                                        <?php endif ?>
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

<!-- Modal para agregar tipo de actividad-->
<?= view("Admin/Areas/agregar"); ?>