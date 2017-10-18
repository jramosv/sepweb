<form method="POST" action="/detalletransacciones/crear">
<div class="modal fade" id="create_transaction_detail" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Agregar información de cliente/proveedor</h4>
			</div>
			<div class="modal-body">
				<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
					<label for="nit">Nit</label>
					<input type="text" name="nit" class="form-control" value="{{ old('nit') }}" autofocus />
					@if( $errors->has('nit'))
						<span class="help-block">
							<strong>{{ $errors->first('nit') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}" />
					@if( $errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label for="phone">Telefono</label>
					<input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
					@if( $errors->has('phone'))
						<span class="help-block">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
					<label for="address">Dirección</label>
					<input type="text" name="address" class="form-control" value="{{ old('address') }}" />
					@if( $errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
					@endif
				</div>

			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Guardar">
			</div>
		</div>
	</div>
</div>
</form>