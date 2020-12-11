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
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">ACTIVIDADES</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">NOMBRE</th>
                            <th scope="col" class="border-top-0">DICTAMEN</th>
                            <th scope="col" class="border-top-0">CREDITOS</th>
                            <th scope="col" class="border-top-0">HORAS</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($actividades as $key => $area) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                
                                <td><?= $area->nombre_actividad ?></td>
                                
                                <td class="text-white">
                                    <?php if($area->estatus == true) : ?>
                                        <span class="bg-success p-1 rounded small">Autorizado</span>
                                    <?php endif ?>
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

