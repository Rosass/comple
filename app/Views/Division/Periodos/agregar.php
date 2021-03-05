<!-- Modal para agregar tipo de actividad-->
<div class="modal fade" id="nuevoPeriodoModal" tabindex="-1" aria-labelledby="nuevoPeriodoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-color-tec-blue text-white text-uppercase">
        <h5 class="modal-title" id="nuevoPeriodoModalLabel">NUEVO PERIODO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
        <div class="modal-body pb-0 text-center">
          <form action="<?= base_url("division/periodos/agregar") ?>" method="POST" class="needs-validation" novalidate>


             <!-- PROVISIONALMENTE SE INSERTARAN CAMPOS "PERIODOS Y DESCRIPCION" DE MANERA MANUAL POR MOTIVOS DE ALIMENTAR SISTEMAS 
             una vez terminado el proceso se descomenta todo y queda como antes  -->
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="nombre">PERIODO (*)</label>
                      <input type="text" name="periodo" id="periodo" class="form-control text-uppercase" placeholder="20201-20202-20203" required>
                      <div class="invalid-feedback">
                        Por favor, rellena este campo
                      </div>
                  </div>
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                      <label for="nombre">DESCRIPCIÓN (*)</label>
                      <input type="text" name="descripcion" id="descripcion" class="form-control text-uppercase" placeholder="'ENE-JUN/2020' 'VERANO/2020' 'AGO-DIC/2020'" required>
                      <div class="invalid-feedback">
                        Por favor, rellena este campo
                      </div>
                  </div>
                </div>  
            </div>   
<!--                     <div class="form-group">
                        <label for="nombre">PERIODO (*)</label>
                        <select class="custom-select" name="periodo" required>
                          <option selected disabled value="">SELECIONA UN PERIODO</option>
                            <option value="<?= date('Y') . "1"?>"><?= "ENE-JUN/". date('Y') ?></option>
                            <option value="<?= date('Y') . "2"?>"><?= "VERANO/". date('Y') ?></option>
                            <option value="<?= date('Y') . "3"?>"><?= "AGO-DIC/". date('Y') ?></option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor, rellena este campo
                        </div>
                    </div> -->
                    
              <div class="row">
					        <div class="col-md-6">
							        <div class="form-group">
                          <label for="fecha_inicio">FECHA DE INICIO (*)</label>
                          <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                          <div class="invalid-feedback">
                              Por favor, rellena este campo
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
							        <div class="form-group">
                          <label for="fecha_final">FECHA FINAL (*)</label>
                          <input type="date" name="fecha_final" id="fecha_final" class="form-control" required>
                          <div class="invalid-feedback">
                              Por favor, rellena este campo
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
					        <div class="col-md-6">
                      <div class="form-group">
                          <label for="fecha_inicio_inscripcion">FECHA INICIO INSCRIPCION (*)</label>
                          <input type="date" name="fecha_inicio_inscripcion" id="fecha_inicio_inscripcion" class="form-control" required>
                          <div class="invalid-feedback">
                            Por favor, rellena este campo
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="fecha_final_inscripcion">FECHA FINAL INSCRIPCION (*)</label>
                          <input type="date" name="fecha_final_inscripcion" id="fecha_final_inscripcion" class="form-control" required>
                          <div class="invalid-feedback">
                            Por favor, rellena este campo
                          </div>
                      </div>
                  </div>
              </div>
                      <div class="form-group">
                          <label for="frase_decreto">FRASE DECRETO </label>
                          <input type="text" name="frase_decreto" id="frase_decreto" class="form-control">
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