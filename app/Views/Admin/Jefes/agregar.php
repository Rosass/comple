<!-- Modal -->
<div class="modal fade" id="nuevoJefeModal" tabindex="-1" aria-labelledby="nuevoJefeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoJefeModalLabel">Nuevo jefe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0 text-center">
        <form action="<?= base_url("admin/jefes/agregar") ?>" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre_jefe">NOMBRE (*)</label>
                        <input type="text" class="form-control text-uppercase" id="nombre_jefe" name="nombre_jefe" required value="<?= old("nombre_jefe") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apaterno_jefe">APELLIDO PATERNO (*)</label>
                        <input type="text" class="form-control text-uppercase" id="apaterno_jefe" name="apaterno_jefe" required value="<?= old("apaterno_jefe") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amaterno_jefe">APELLIDO MATERNO (*)</label>
                        <input type="text" class="form-control text-uppercase" id="amaterno_jefe" name="amaterno_jefe" required value="<?= old("amaterno_jefe") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rfc_jefe">RFC (*)</label>
                        <input type="text" class="form-control text-uppercase" id="rfc_jefe" name="rfc_jefe" required value="<?= old("rfc_jefe") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono_jefe">TELEFONO</label>
                        <input type="text" class="form-control" id="telefono_jefe" name="telefono_jefe" value="<?= old("telefono_jefe") ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="correo_jefe">CORREO</label>
                        <input type="email" class="form-control" id="correo_jefe" name="correo_jefe" value="<?= old("correo_jefe") ?>">
                        <div class="invalid-feedback">
				            Por favor, introduce un correo válido
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