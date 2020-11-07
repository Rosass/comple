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
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaAlumnos">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">Calificacion </h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">No</th>
                            <th scope="col" class="border-top-0">No.Control</th>
                            <th scope="col" class="border-top-0">Nombre</th>
                            <th scope="col" class="border-top-0">Carrera</th>
                            <th scope="col" class="border-top-0">Semestre</th>
                            <th scope="col" class="border-top-0">Calificaciones</th>
                            <th scope="col" class="border-top-0">Accion</th>

                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($alumnos as $key => $alumno) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $alumno['num_control'] ?></td>
                                <td><?= $alumno['nombre'] . ' ' . $alumno['ap_materno'] .' '. $alumno['ap_paterno']?></td>
                                <td><?= $alumno['carrera'] ?></td>                             
                                <td><?= $alumno['semestre'] ?></td>  
                                <td></td> 
                                <td style="width:8%;">  
                                    <div class="d-flex flex-column">
                                    <a class="btn btn-info btn-sm btn-block mb-0" href="<?= base_url("responsables/evaluacion/") ?>"><i class="fas fa-file-alt"></i> Evaluacion Desempeño</a>                                   
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

