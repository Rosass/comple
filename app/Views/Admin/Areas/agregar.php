<!-- Modal -->
<div class="modal fade" id="nuevoAreaModal" tabindex="-1" aria-labelledby="nuevoAreaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoAreaModalLabel">Nueva área</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0 text-center ">
        <form action="<?= base_url("admin/areas/agregar") ?>" method="POST" class="needs-validation" novalidate>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_area">NOMBRE (*)</label>
                        <input type="text" class="form-control text-uppercase" id="nombre_area" name="nombre_area" required value="<?= old("nombre_area") ?>">
                        <div class="invalid-feedback">
				            Por favor, rellena este campo
				        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rfc_jefe">RFC </label>
                        <select class="custom-select" name="rfc_jefe">
                            <option selected disabled value="">Elige un jefe</option>
                            <?php foreach($jefes as $key => $jefe) : ?>
                                <option value="<?= $jefe->rfc_jefe ?>"><?= $jefe->rfc_jefe ?> : <?= $jefe->nombre_jefe . " " . $jefe->apaterno_jefe ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">TIPO DEPARTAMENTO </label>
                        <select class="custom-select" name="id">
                            <option selected disabled value="">Elige un tipo</option>
                            <?php foreach($tipo_departamento as $key => $tipo) : ?>
                                <option value="<?= $tipo->id ?>"><?= $tipo->id ?> : <?= $tipo->tipo_departamento ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="folio">FOLIO</label>
                        <input type="text" class="form-control text-uppercase" id="folio" name="folio" placeholder="ejemplo: 11V.1.1.4.0.0/EXT/" value="<?= old("folio") ?>">
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