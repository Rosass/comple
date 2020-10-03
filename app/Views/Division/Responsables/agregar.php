<!-- Modal -->
<div class="modal fade" id="nuevoResponsableModal" tabindex="-1" aria-labelledby="nuevoResponsableModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoResponsableModalLabel">Nuevo responsable</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0 text-center">
        <form action="<?= base_url("division/responsables/agregar") ?>" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">NOMBRE (*)</label>
                        <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" required value="<?= old("nombre") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apaterno">APELLIDO PATERNO (*)</label>
                        <input type="text" class="form-control text-uppercase" id="apaterno" name="apaterno" required value="<?= old("apaterno") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amaterno">APELLIDO MATERNO (*)</label>
                        <input type="text" class="form-control text-uppercase" id="amaterno" name="amaterno" required value="<?= old("amaterno") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rfc">RFC (*)</label>
                        <input type="text" class="form-control text-uppercase" id="rfc" name="rfc" required value="<?= old("rfc") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">TELEFONO</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= old("telefono") ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="correo">CORREO</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= old("correo") ?>">
                        <div class="invalid-feedback">
				            Por favor, introduce un correo válido
				        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clave">CLAVE (*)</label>
                        <input type="password" class="form-control" id="clave" name="clave" required value="<?= old("clave") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="confirmar_clave">REPETIR CLAVE (*)</label>
                        <input type="password" class="form-control" id="confirmar_clave" name="confirmar_clave" required value="<?= old("confirmar_clave") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
            </div>
            <small>Los campos marcados con (*) son obligatorios.</small>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn bg-color-tec-blue text-white" id="btnGuardar"><i class="fas fa-check"></i> Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>