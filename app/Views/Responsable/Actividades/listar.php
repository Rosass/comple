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
            <!-- Select por periodos -->
            <form method="get" action="<?= base_url("responsables/inicio/periodo") ?>">
                <div class="row mb-3 mt-0 justify-content-end">
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
            </form>
            <div class="table-responsive-sm text-center">
            <table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">ACTIVIDADES</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">DICTAMEN</th>
                            <th scope="col" class="border-top-0">CRÉDITOS</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">TIPO ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">HORAS</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            <th scope="col" class="border-top-0">ACCIÓN</th>
                            <th scope="col" class="border-top-0"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($actividades as $key => $actividad) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $actividad->nombre_actividad ?></td>
                                <td><?= $actividad->numero_dictamen ?></td>
                                <td><?= $actividad->creditos ?></td>                             
                                <td><?= $actividad->periodo_descripcion ?></td>  
                                <td><?= $actividad->tipo_actividad ?></td>                                                          
                                <td><?= $actividad->horas ?></td>
                                <td><?= $actividad->horario ?></td>
                                <td class="text-white">
                                    <?php if($actividad->estatus == true) : ?>
                                        <span class="bg-success p-1 rounded small">Autorizado</span>
                                    <?php else : ?>
                                        <span class="bg-danger p-1 rounded small">Rechazado</span>
                                    <?php endif ?>
                                </td> 
                                <td style="width:8%;">  
                                    <div class="d-flex flex-column">
                                    <a class="btn btn-info btn-sm btn-block mb-0" href="<?= base_url("responsables/calificaciones/$actividad->id_actividad") ?>"><i class="fas fa-file-alt"></i> Asignar calificaciones</a>
                                    <a class="btn btn-warning btn-sm btn-block mb-0" target="_blank"  href="<?= base_url("responsables/lista-asistencia/$actividad->id_actividad") ?>"><i class="fas fa-file-pdf"></i> (PDF) Lista de asistencia</a>
                                    <a class="btn btn-secondary btn-sm btn-block mb-0" target="_blank" href="<?= base_url("responsables/lista-calificacion/$actividad->id_actividad") ?>"><i class="fas fa-file-alt"></i> Acta de calificaciones</a>
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