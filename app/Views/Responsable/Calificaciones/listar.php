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
                            <th scope="col" class="border-top-0">Nombre</th>
                            <th scope="col" class="border-top-0">No.Control</th>
                            <th scope="col" class="border-top-0">Carrera</th>
                            <th scope="col" class="border-top-0">Semestre</th>
                            <th scope="col" class="border-top-0">Calificaciones</th>
                            <th scope="col" class="border-top-0"></th>
                        </tr>
                    </thead>
                    
                        
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Responsable-->

