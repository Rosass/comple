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
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevaInscripcionModal"><i class="fas fa-plus"></i> Nueva inscripción</button>
            </div> 
            <div class="row text-center justify-content-center mb-3">
                <div class="col-md-5 ">
                    <div class="form-group">
                        <form method="get" action="<?= base_url("division/inscripciones/periodo") ?>">
                            <label>Filtro por Periodo </label>
                            <div class="input-group">
                                <select class="custom-select"  name="periodo">
                                    <option selected disabled value="">Elige el periodo</option>
                                    <option value="0">ACTIVO</option>
                                    <?php foreach($periodo as $key => $periodo) : ?>
                                        <option value="<?= $periodo->periodo ?>"><?= $periodo->descripcion ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button type="submit"  class="btn bg-color-tec-blue text-white">Buscar</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Filtro por Actividad </label>                        
                        <select class="custom-select" id="selectActividad">
                            <option selected disabled value="">Elige la actividad</option>
                            <option value="0">TODAS LAS ACTIVIDADES</option>
                            <?php foreach($actividades as $key => $actividad) : ?>
                                <option value="<?= $actividad->id_actividad ?>"><?= $actividad->nombre_actividad ?></option>
                            <?php endforeach ?>
                        </select>  
                    </div>        
                </div>
            </div>          
            <div class="table-responsive-sm text-center"> 
                <table class="table table-hover table-light table-striped shadow-lg" id="tablaInscripciones">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-3"><h3 class="mb-0">INSCRIPCIONES</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">NO CONTROL</th>
                            <th scope="col" class="border-top-0">ALUMNO</th>
                            <th scope="col" class="border-top-0">CARRERA</th>
                            <th scope="col" class="border-top-0">SEMESTRE</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">TELEFONO</th>
                            <th scope="col" class="border-top-0">FECHA DE INSCRIPCIÓN</th>
                            <th scope="col" class="border-top-0">OBSERVACION</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            <th scope="col" class="border-top-0"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm" id="tbodyTablaInscripciones">
                        <?php foreach($inscripciones as $key => $inscripcion) : ?>
                            <tr>
                                <th scope="row"><?= $key +1 ?></th>
                                <td><?= $inscripcion->num_control ?></td>
                                <td><?= $inscripcion->nombre . " " . $inscripcion->ap_paterno . " " . $inscripcion->ap_materno ?></td>
                                <td><?= $inscripcion->carrera?></td>
                                <td><?= $inscripcion->semestre?></td>
                                <td><?= $inscripcion->descripcion_periodo?></td>
                                <td><?= $inscripcion->nombre_actividad ?></td>
                                <td><?= $inscripcion->telefono ?></td>
                                <td><?= $inscripcion->fecha_inscripcion ?></td>
                                <td><?= $inscripcion->nota ?></td>
                                <td class="text-white">
								<?php if($inscripcion->estatus == 1) : ?>
								<span class="bg-warning p-1 rounded small">Solicitada</span>
                                    <?php endif ?>
                                <?php if($inscripcion->estatus == 2) : ?>
								<span class="bg-success p-1 rounded small">Aceptada</span>
                                    <?php endif ?>
                                <?php if($inscripcion->estatus == 0) : ?>
								<span class="bg-danger p-1 rounded small">Rechazada</span>
								<?php endif ?>                                 
							    </td>
                                <td style="width:9%;">
                                    <div class="d-flex flex-column">
                                        <!--  Editar inscripción -->
                                        <?php if($inscripcion->estatus == true) : ?>
                                        <a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("division/inscripciones/editar/".$inscripcion->id_inscripcion) ?>"><i class="fas fa-pen"></i> Editar</a>
                                        <?php endif ?>
                                        <!-- Aceptar inscripción -->
                                        <?php if($inscripcion->estatus == 1 || $inscripcion->estatus ==  0) : ?>                                   
                                            <form action="<?= base_url('division/inscripciones/cambiar-estatus-aceptar') ?>" method="POST">
                                                <input type="hidden" name="id_inscripcion" value="<?= $inscripcion->id_inscripcion ?>">
                                                <button type="submit" class="btn btn-success btn-sm btn-block mb-1 btnEnviarFormulario" data-no_control="<?= $inscripcion->num_control ?>" ><i class="fas fa-check"></i> Aceptar</button>
                                            </form>
                                            <?php endif ?>
                                        <?php if($inscripcion->estatus == true) : ?>                                                        
                                        <!-- Rechazar inscripción -->            
                                            <form action="<?= base_url('division/inscripciones/cambiar-estatus-rechazar') ?>" method="POST">
                                                <input type="hidden" name="id_inscripcion" value="<?= $inscripcion->id_inscripcion ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-block  btnEnviarFormulario" data-no_control="<?= $inscripcion->num_control ?>" ><i class="fas fa-ban"></i> Rechazar</button>
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

<!-- Modal para agregar Inscripcion-->
<?= view("Division/Inscripciones/agregar"); ?>