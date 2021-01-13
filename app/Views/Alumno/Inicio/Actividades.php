<?php $session = session();?>
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
<<<<<<< HEAD
            <?php endif ?>   
            <?php if (  $numeroActividades >= 5 ) : ?>
                    <div class="alert alert-success">
                        <p><i class="fas fa-check-circle text-success"></i> ¡Has terminado tus Actividades Complementarias !!</p>
                    </div>
                <?php else: ?>  
                <div class="table-responsive-sm text-center">
=======
                <?php endif ?>   
            <div class="table-responsive-sm text-center">
>>>>>>> 432087bf7288a049b0e587601b264f1e6545661b
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
                            <th scope="col" class="border-top-0">RESPONSABLE</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php $i = 1; foreach($actividades as $ey => $actividad) : ?>
                            <tr>
                            <th scope="row"><?= $i ++?></th>
                                <td><?= $actividad['periodo'] ?></td>
                                <td><?= $actividad['actividad'] ?></td>
                                <td><?= $actividad['tipo_actividad'] ?></td>
                                <td><?= $actividad['credito'] ?></td>
                                <td><?= $actividad['nombre']. " " . $actividad['apaterno'] . " " . $actividad['amaterno']  ?></td>
                                <td><?= $actividad['horario'] ?></td>
                                <td class="text-white">
								<?php if($actividad['estatus'] == 1) : ?>
								<span class="bg-warning p-1 rounded small">Solicitada</span>
                                    <?php endif ?>
                                <?php if($actividad['estatus'] == 2) : ?>
								<span class="bg-success p-1 rounded small">Aceptada</span>
                                    <?php endif ?>
                                <?php if($actividad['estatus'] == 0) : ?>
								<span class="bg-danger p-1 rounded small">Rechasada</span>
								    <?php endif ?>                                
						    	</td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>