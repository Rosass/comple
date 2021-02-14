<!-- Modal -->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" aria-labelledby="nuevoUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoUsuarioModalLabel">Nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0 text-center">
        <form action="<?= base_url("admin/usuarios/agregar") ?>" method="POST" class="needs-validation" novalidate>
          <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="usuario">USUARIO (*)</label>
                        <input type="text" class="form-control" placeholder="usuario en minuscula" id="usuario" name="usuario" required value="<?= old("usuario") ?>">
                        <div class="invalid-feedback">
				                  Por favor, rellena este campo
				                </div>
                    </div>
                </div>            
						    <div class="col-md-4">
							   <div class="form-group">
                    <label for="telefono">ÁREA (*)</label>
                    <select class="custom-select" name="id_area" required id="area">
                      <option selected disabled value="">Elige una área</option>
                      <?php foreach($areas as $key => $area) : ?>
                      <option value="<?= $area->id_area ?>"><?= $area->nombre_area ?></option>
                      <?php endforeach ?>
								    </select>
								    <div class="invalid-feedback">
									    Por favor, rellena este campo
								    </div>
							    </div>
						    </div>
						    <div class="col-md-4">
							    <div class="form-group">
                    <label for="clave">TIPO (*)</label>
                    <select class="custom-select" name="id_tipo_usuario" id="tipo" required>
                      <option selected disabled value="">Elige el tipo de usuario</option>
                      <?php foreach($tipos_usuarios as $key => $tipo) : ?>
                      <option value="<?= $tipo->id_tipo_usuario ?>"><?= $tipo->nombre_tipo ?></option>
                      <?php endforeach ?>
								    </select>
                    <div class="invalid-feedback">
                      Por favor, rellena este campo
                    </div>
							    </div>
						    </div>
				     </div>         
             <div class="row justify-content-center">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="clave">CLAVE (*)</label>
                        <input type="password" class="form-control" id="clave" name="clave" required value="<?= old("clave") ?>">
                        <div class="invalid-feedback">
				                Por favor, rellena este campo
				                </div>
                    </div>
                  </div>
                <div class="col-md-6">
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