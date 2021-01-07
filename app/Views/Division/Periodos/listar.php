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
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevoPeriodoModal"><i class="fas fa-plus"></i> Nuevo periodo</button>
            </div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaPeriodos">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-3"><h3 class="mb-0">PERIODOS</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">DESCRIPCIÓN</th>
                            <th scope="col" class="border-top-0">FECHA INICIO</th>
                            <th scope="col" class="border-top-0">FECHA FIN</th>
                            <th scope="col" class="border-top-0">FECHA INICIO INSCRIPCION</th>
                            <th scope="col" class="border-top-0">FECHA FINAL INSCRIPCION</th>
                            <th scope="col" class="border-top-0">FRASE DECRETO</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            <th scope="col" class="border-top-0"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($periodos as $key => $periodo) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $periodo->periodo ?></td>
                                <td><?= $periodo->descripcion ?></td>
                                <td><?= $periodo->fecha_inicio ?></td>
                                <td><?= $periodo->fecha_final ?></td>
                                <td><?= $periodo->fecha_inicio_inscripcion ?></td>
                                <td><?= $periodo->fecha_final_inscripcion ?></td>
                                <td><?= $periodo->frase_decreto ?></td>
                                <td class="text-white">
                                    <?php if($periodo->estatus == true) : ?>
                                        <span class="bg-success p-1 rounded small">Activo</span>
                                    <?php else : ?>
                                        <span class="bg-danger p-1 rounded small">Inactivo</span>
                                    <?php endif ?>
                                </td>
                                <td style="width:12%;">
                                    <div class="d-flex flex-column">
                                        <!--  Editar tipo-->
                                        <a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("division/periodos/editar/".$periodo->periodo) ?>"><i class="fas fa-pen"></i> Editar</a>
                                        <?php if($periodo->estatus == true) : ?>
                                            <form action="<?= base_url('division/periodos/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="periodo" value="<?= $periodo->periodo ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
                                            </form>
                                        <?php else : ?>
                                            <form action="<?= base_url('division/periodos/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="periodo" value="<?= $periodo->periodo ?>">
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

<!-- Modal para agregar tipo de actividad-->
<?= view("Division/Periodos/agregar"); ?>