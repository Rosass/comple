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
            <div class="text-right">
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevaActividadModal"><i class="fas fa-plus"></i> Nueva actividad</button>
            </div>
           
                <form method="get" action="<?= base_url("division/actividades/periodo") ?>">
                    <div class="row mb-3 mt-2 justify-content-end">
                        <div class="col-md-5 text-right d-flex align-items-center">
                            <span class="mr-2">Filtro </span>
                            <select class="custom-select"  name="periodo">
                                <option selected disabled value="">Elige el periodo</option>
                                <option value="0"> PERIODO ACTIVO</option>
                                <?php foreach($periodo as $key => $periodo) : ?>
                                    <option value="<?= $periodo->periodo ?>"><?= $periodo->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                            
                                <button type="submit"  class="btn bg-color-tec-blue text-white">Buscar</button>
                        
                        </div>
                    </div>
                </form>
            
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaActividades">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">ACTIVIDADES ACTIVAS</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">DICTAMEN</th>
                            <th scope="col" class="border-top-0">CRED.</th>
                            <th scope="col" class="border-top-0">CAPACIDAD</th>
                            <th scope="col" class="border-top-0">AREA</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">TIPO</th>
                            <th scope="col" class="border-top-0">RESPONSABLE</th>
                            <th scope="col" class="border-top-0">HORAS</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                          
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
                                <td><?= $actividad->capacidad ?></td>
                                <td><?= $actividad->nombre_area ?></td>
                                <td><?= $actividad->periodo_descripcion ?></td>
                                <td><?= $actividad->tipo_actividad ?></td>
                                <td><?= $actividad->rfc_responsable ?></td>
                                <td><?= $actividad->horas ?></td>
                                <td><?= $actividad->horario ?></td> 
                               
                                <td style="width:9%;">
                                    <div class="d-flex flex-column" >
                                    <a class="btn btn-info btn-sm btn-block mb-0" target="_blank" href="<?= base_url("division/lista-alumnos/$actividad->id_actividad") ?>"><i class="fas fa-file-pdf"></i> (PDF) Lista de Alumnos</a>
                                        <!--  Editar responsable-->
                                        <a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("division/actividades/editar/".$actividad->id_actividad) ?>"><i class="fas fa-pen"></i> Editar</a>
                                        <?php if($actividad->estatus == true) : ?>
                                            <form action="<?= base_url('division/actividades/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="id_actividad" value="<?= $actividad->id_actividad ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
                                            </form>
                                        <?php else : ?> 
                                            <form action="<?= base_url('division/actividades/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="id_actividad" value="<?= $actividad->id_actividad ?>">
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
<?= view("Division/Actividades/agregar"); ?>