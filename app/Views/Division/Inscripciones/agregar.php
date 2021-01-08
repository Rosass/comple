<!-- Modal -->
<div class="modal fade" id="nuevaInscripcionModal" tabindex="-1" aria-labelledby="nuevaInscripcionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevaInscripcionModalLabel">NUEVA INSCRIPCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        </div>
        <div class="modal-body pb-0 text-center">
        <form action="<?= base_url("division/inscripciones/agregar") ?>" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="num_control">NO CONTROL (*)</label>
                        <input type="text" class="form-control text-uppercase" id="num_control" name="num_control" required value="<?= old("num_control") ?>" required>
                        <div class="invalid-feedback">
                            Por favor, rellena este campo
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="periodo">PERIODO (*)</label>
                        <select class="custom-select" name="periodo"  required>
                            <option selected disabled zise="1">Elige un periodo</option>
                            <?php foreach($periodos as $key => $periodo) : ?>
                                <option value="<?= $periodo->periodo ?>"><?= $periodo->descripcion ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, rellena este campo
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="id_actividad">ACTIVIDAD (*)</label>
                        <select class="custom-select" name="id_actividad" required>
                            <option selected disabled value="">Elige la actividad</option>
                            <?php foreach($actividades as $key => $actividad) : ?>
                                <option value="<?= $actividad->id_actividad ?>"><?= $actividad->nombre_actividad ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, rellena este campo
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">TELEFONO</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= old("telefono") ?>">
                    </div>
                    <div class="invalid-feedback">
                            Por favor, rellena este campo
                    </div>
                </div>     
            </div>
                    <div class="form-group" >
                        <label for="nota">NOTA</label>
                        <textarea class="form-control" id="nota" name="nota" rows="2" value="<?= old("nota") ?>"></textarea>
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