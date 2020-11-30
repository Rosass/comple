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
            <div class="row ">
                <div class="col-md-5">
                    <form id="formulario-buscar-alumno">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="inputNoControl" placeholder="No control">
                            <div class="input-group-append">
                            <button class="input-group-text btn bg-success"  id="btnBuscar"><i class="fas fa-search"></i>Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="datos-alumno"></div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">Historial</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Periodo</th>
                            <th scope="col" class="border-top-0">Nombre Actividad</th>
                            <th scope="col" class="border-top-0">Tipo Actividad</th>
                            <th scope="col" class="border-top-0">Horas</th>
                            <th scope="col" class="border-top-0">Horario</th>
                            <th scope="col" class="border-top-0">Responsable</th>
                            <th scope="col" class="border-top-0">Calificacion</th>                                   
                        </tr>
                    </thead>
                    <tbody id="tbodyResult">
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

