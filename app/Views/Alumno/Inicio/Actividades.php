<?php $session = session(); ?>
<div class="container-fluid">
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
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">MIS ACTIVIDADES</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">TIPO DE ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">CREDITOS</th>
                            <th scope="col" class="border-top-0">FECHA DE INSCRIPCION</th>
                            <th scope="col" class="border-top-0">RESPONSABLE</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">CALIFICACION</th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($actividades as $key => $actividad) : ?>
                            <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $actividad->periodo_descripcion ?></td>
                                <td><?= $actividad->actividad ?></td>
                                <td><?= $actividad->tipo ?></td>
                                <td><?= $actividad->credito ?></td>
                                <td><?= $actividad->fecha_inscripcion?></td>
                                <td><?= $actividad->responsable ?></td>
                                <td><?= $actividad->horario ?></td>
                                <td><?= $actividad->calificacion ?></td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>