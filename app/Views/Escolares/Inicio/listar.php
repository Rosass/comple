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
                            <button class="input-group-text btn bg-success"  id="btnBuscar"><i class="fas fa-search"></i>Buscar</button>
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
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">Historial</h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Periodo</th>
                            <th scope="col" class="border-top-0">Nombre Actividad</th>
                            <th scope="col" class="border-top-0">Tipo Actividad</th>
                            <th scope="col" class="border-top-0">Creditos</th>
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

<!-- Button trigger modal -->

<!-- oviamente tendras que ver si la constancia es parcial o de liberacion y si es necesario haz otro de estos modal -->
<!-- Modal -->
<!-- el modal se realciona con el boton a travez del  id  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white ">
        <h5 class="modal-title" id="exampleModalLabel">Generación de constancia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
             </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- y aca codigo javascrip para enviar el formulario al controlador y traer los datos y generar la onstancia  -->


<div class="modal fade" id="examplesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="exampleModalLabel">Generación de constancia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>