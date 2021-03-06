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
            <div class="form-group text-left mt-0 mb-3">
            <a href="<?= base_url('responsables/inicio') ?>" class="btn btn-primary" class="text-muted text-decoration-none"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <div>
                <p style="text-align: center;"><strong>Actividad:</strong> <span class="font-weight-bold"><?php foreach($actividad as  $act) : ?> <u><?= $act->nombre_actividad ?></u><?php endforeach ?></span></p>
            </div>
            <div class="alert alert-info">
                <div style="text-align: center; text-align: justify;">Hombres: <span class="font-weight-bold"><?= $hombres?></span></div>
                <div  style="text-align: center; text-align: justify;">Mujeres: <span  class="font-weight-bold"><?= $mujeres?></span></div>
            </div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">CALIFICACIÓN </h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">NO.CONTROL</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">CARRERA</th>
                            <th scope="col" class="border-top-0">SEMESTRE</th>
                            <th scope="col" class="border-top-0">CALIFICACIÓN</th>
                            <th scope="col" class="border-top-0">NIVEL DESEMPEÑO</th>
                            <th scope="col" class="border-top-0"></th>

                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($alumnos as $key => $alumno) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $alumno['num_control'] ?></td>
                                <td><?= $alumno['nombre'] . ' ' . $alumno['ap_paterno'] .' '. $alumno['ap_materno']?></td>
                                <td><?= $alumno['carrera'] ?></td>
                                <td><?= $alumno['semestre'] ?></td>
                                <td><?= $alumno['valor_numerico'] ?></td> 
                                <td><?= $alumno['nivel_desempeno'] ?></td>                    
                                <td style="width:8%;">             
                                        <?php if ( $alumno['valor_numerico'] >= 1) :?>
                                            <span> CALIFICACIÓN ASIGNADA</span> 
                                        <?php elseif ( $alumno['nivel_desempeno'] == 'Insuficiente') :?>
                                            <span style="color:red;">NO ACREDITADO</span>
                                        <?php else: ?>
                                        <div class="d-flex flex-column">
                                            <a class="btn btn-info btn-sm btn-block mb-0" href="<?= base_url("responsables/evaluacion/$alumno[num_control]/$alumno[id_inscripcion]/$id_actividad") ?>"><i class="fas fa-file-alt"></i> Evaluacion Desempeño</a>                                   
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

