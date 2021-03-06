<?php
$session = session(); ?>
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
            <a href="<?= base_url('jefes/actividades') ?>" class="btn btn-primary" class="text-muted text-decoration-none"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <div>
                <p style="text-align: center;"><strong>Actividad:</strong> <span class="font-weight-bold"><?php foreach($actividad as  $act) : ?> <u><?= $act->nombre_actividad ?></u><?php endforeach ?></span></p>
            </div>
            <div class="alert alert-success">
                <div style="text-align: center; text-align: justify;">Hombres: <span class="font-weight-bold"><?= $hombres?></span></div>
                <div style="text-align: center; text-align: justify;">Mujeres: <span class="font-weight-bold"><?= $mujeres?></span></div>
            </div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">CALIFICACIÓN </h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">NO</th>
                            <th scope="col" class="border-top-0">NO.CONTROL</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">CARRERA</th>
                            <th scope="col" class="border-top-0">SEMESTRE</th>
                            <th scope="col" class="border-top-0">CALIFICACIÓN</th>
                            <th scope="col" class="border-top-0">NIVEL DESEMPEÑO</th>
                            <th scope="col" class="border-top-0">ACCIÓN</th>
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
                                <?php
                                if ( $alumno['valor_numerico'] >= 1)
                                    :?>
                                    <div class="d-flex flex-column">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?=$alumno['num_control']?>">(PDF) Constancia</button>
                                    </div>
                                    <div class="modal fade" id="modal-<?=$alumno['num_control']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-color-tec-blue text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel">Constancia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url( 'jefes/constancia' ) ?>" method="POST" target="_blank">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">* N° control</label>
                                                            <input type="text" class="form-control" id="ncontrol" name="ncontrol" value="<?=$alumno['num_control']?>" placeholder="No. Control" readonly>
                                                            <input type="hidden" name="periodo" value=<?= substr($alumno['periodo'], 0, -1 ) ?> >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">*Agrega el folio</label>
                                                            <input type="text" class="form-control" id="folio" name="folio" placeholder="FOLIO AQUI...">
                                                        </div>
                                                        <input type="hidden" name="id_actividad" value="<?= $id_actividad?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit"  target="_blank" href="" class="btn btn-primary"><i class="fas fa-file-pdf"></i>PDF</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <?php
                                if ( $alumno['nivel_desempeno'] == 'Insuficiente') echo "<strong style='color: red;'>No Acreditado</strong>";
                                ?>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



