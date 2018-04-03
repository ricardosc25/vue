<!-- VENTA MODAL PARA CREAR UN USUARIO -->
	<form method="POST" v-on:submit.prevent="crearUsuario">
		{!! csrf_field() !!}
		<div class="modal fade" id="CrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="nombre" class="col-form-label">Nombre:</label>
							<input type="text" name="nombre" class="form-control" v-model="newUser">
							<span class="error" v-for="error in errors">@{{ error }}</span>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">Guardar</button>
				</div>
			</div>
		</div>
	</div>	
	</form>
	