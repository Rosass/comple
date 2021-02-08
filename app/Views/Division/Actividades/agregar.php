<!-- Modal -->
<div class="modal fade" id="nuevaActividadModal" tabindex="-1" aria-labelledby="nuevaActividadModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-color-tec-blue text-white text-uppercase">
				<h5 class="modal-title" id="nuevaActividadModalLabel">NUEVA ACTIVIDAD</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
			<div class="modal-body pb-0 text-center">
				<form action="<?= base_url("division/actividades/agregar") ?>" method="POST" class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nombre">NOMBRE (*)</label>
								<input type="text" class="form-control text-uppercase" id="nombre" name="nombre" required value="<?= old("nombre") ?>" required>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="dictamen">DICTAMEN (*)</label>
								<input type="text" class="form-control text-uppercase" id="dictamen" name="dictamen" value="<?= old("dictamen") ?>" required>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="creditos">NÚMERO DE CREDITOS (*)</label>
								<input type="number" class="form-control text-uppercase" id="creditos" name="creditos" required value="<?= old("creditos") ?>" required>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="horas">NÚMERO DE HORAS</label>
								<input type="number" class="form-control" id="horas" name="horas" value="<?= old("horas") ?>" min="0">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="capacidad">CAPACIDAD (*)</label>
								<input type="number" class="form-control text-uppercase" id="capacidad" name="capacidad" required value="<?= old("capacidad") ?>" required>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="id_area">ÁREA (*)</label>
								<select class="custom-select" name="id_area" id="area21"  required>
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
								<label for="periodo">PERIODO (*)</label>
								<select class="custom-select" name="periodo" required id="periodo">
									<option selected disabled value="">Elige un periodo</option>
									<?php foreach($periodo as $key => $periodo) : ?>
									<option value="<?= $periodo->periodo ?>"><?= $periodo->descripcion ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="id_tipo_actividad">TIPO (*)</label>
								<select class="custom-select" name="id_tipo_actividad" id="select-tipo21" required>
									<option selected disabled value="">Elige el tipo de actividad</option>
									
								</select>
								<div class="invalid-feedback">
									Por favor, rellena este campo
								</div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="form-group">
								<label for="horario">HORARIO</label>
								<input type="horario" class="form-control text-uppercase" id="horario" name="horario" placeholder="LUN 13:00-15:00; MAR 13:00-15:00; VIE 07:00-09:00"  value="<?= old("horario") ?>">
								<small>Los horarios debes separarlos por punto y coma ';'.</small>
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
