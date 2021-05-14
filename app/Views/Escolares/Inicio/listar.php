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
                <div class="col-md-12">
                    <form id="formulario-buscar-alumno">
                        <div class="input-group mb-2 col-md-5">
                            <input type="text" class="form-control" id="inputNoControl" placeholder="No control">
                            <div class="input-group-append">
                            <button class="input-group-text text-white btn bg-success"  id="btnBuscar"><i class="fas mr-1 fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-center my-3"><div class="col-3" id="loading"></div></div>
                </div>
            </div>
            <div id="datos-alumno"></div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-light table-striped shadow-lg">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">HISTORIAL</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">PERIODO</th>
                            <th scope="col" class="border-top-0">NOMBRE ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">TIPO ACTIVIDAD</th>
                            <th scope="col" class="border-top-0">CRÉDITOS</th>
                            <th scope="col" class="border-top-0">HORAS</th>
                            <th scope="col" class="border-top-0">HORARIO</th>
                            <th scope="col" class="border-top-0">RESPONSABLE</th>
                            <th scope="col" class="border-top-0">CALIFICACIÓN</th>                                   
                        </tr>
                    </thead>
                    <tbody id="tbodyResult"></tbody>
                    <tfoot id="extra-info"></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
