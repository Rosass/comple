<!-- Modal para agregar tipo de actividad-->
<div class="modal fade" id="nuevoTipoModal" tabindex="-1" aria-labelledby="nuevoTipoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoTipoModalLabel">NUEVO TIPO DE ACTIVIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-0 text-center">
          <form action="<?= base_url("division/tipos-actividades/agregar") ?>" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
              <label for="nombre">NOMBRE DEL TIPO (*)</label>
                <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" required value="<?= old("nombre") ?>">
                <div class="invalid-feedback">
					Por favor, rellena este campo
			    </div>
            </div>
            <small class="text-center">Los campos marcados con (*) son obligatorios.</small>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn bg-color-tec-blue text-white" id="btnGuardar"><i class="fas fa-check"></i> Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>