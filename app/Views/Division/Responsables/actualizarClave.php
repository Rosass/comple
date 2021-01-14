<div class="modal fade" id="editarClaveModal<?= $responsable->rfc_responsable ?>" tabindex="-1" aria-labelledby="editarClaveModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-color-tec-blue text-white text-uppercase">
				<h5 class="modal-title" id="editarClaveModalLabel">Actualización de clave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pb-0 text-muted">
				<form action="<?= base_url("division/responsables/editar-clave") ?>" method="POST">
					<div class="row">
						<input type="hidden" class="form-control disabled" id="rfc" name="rfc" value="<?= $responsable->rfc_responsable ?>">
						<div class="col">
							<div class="form-group">
								<label for="clave">NUEVA CLAVE (*)</label>
								<input type="password" class="form-control" name="clave" required>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="confirmar_clave">REPETIR NUEVA CLAVE (*)</label>
								<input type="password" class="form-control"  name="confirmar_clave" required>
							</div>
						</div>
					</div>
					<small>Los campos marcados con (*) son obligatorios.</small>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn bg-color-tec-blue text-white btnEnviarFormulario"><i class="fas fa-check"></i> Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
