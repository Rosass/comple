<?php $session = session(); 
function valida_fecha( $fecha_inicio, $fecha_fin )
{
    date_default_timezone_set('America/Mexico_City');
    $fecha_servidor = date('Y-m-d');

    //* Para la comparación las fechas deben tener el mismo formato
    if (( $fecha_servidor >= $fecha_inicio) && ($fecha_servidor <= $fecha_fin) ) {
        return true;
    }
    return false;
}

?>


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
                <?php if (  $numeroActividades >= 5 ) : ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle text-success"></i> ¡Has terminado tus Actividades Complementarias!</i>
                    </div>
                <?php elseif ( !valida_fecha( $periodos->fecha_inicio_inscripcion, $periodos->fecha_final_inscripcion)) :?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> Ha terminado la fecha de inscripciones, Para más información acudir con Division de Estudios Profesionales.</i>
                    </div>
                <?php else: ?>
                
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
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal para agregar tipo de actividad-->
<?= view("Alumno/Inscripciones/agregar"); ?>