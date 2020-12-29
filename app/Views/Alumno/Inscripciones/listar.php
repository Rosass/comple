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
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevaInscripcionModal"><i class="fas fa-plus"></i> Nueva inscripción</button>
            </div> 
    
            <div class="table-responsive-sm text-center"> 
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaInscripciones">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-3"><h3 class="mb-0"> ACTIVIDADES DISPONIBLES </h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">TIPO DE ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">CREDITOS</th>
                            <th scope="col" class="border-top-0">HORAS</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">RESPONSABLE</th>
        
                            
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm" id="tbodyTablaInscripciones">
                        <?php foreach($actividades as $key => $actividad) : ?>
                            <tr>
                                <th scope="row"><?= $key +1 ?></th>
                                <td><?= $actividad->descripcion_periodo?></td>
                                <td><?= $actividad->nombre_actividad ?></td>
                                <td><?= $actividad->tipo ?></td>
                                <td><?= $actividad->creditos?></td>
                                <td><?= $actividad->horas?></td>
                                <td><?= $actividad->horario?></td>
                                <td><?= $actividad->nombre . " " . $actividad->apaterno . " " . $actividad->amaterno ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar tipo de actividad-->
<?= view("Alumno/Inscripciones/agregar"); ?>
