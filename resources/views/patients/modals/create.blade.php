<form method="POST" action="/pacientes">
<div class="modal fade" tabindex="-1" id="create_patient" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Crear paciente</h4>
			</div>
			<div class="modal-body">
				<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
					<label for="first_name">Nombre</label>
					<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" autofocus />
					@if( $errors->has('first_name'))
						<span class="help-block">
							<strong>{{ $errors->first('first_name') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
					<label for="last_name">Apellidos</label>
					<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" />
					@if( $errors->has('last_name'))
						<span class="help-block">
							<strong>{{ $errors->first('last_name') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('date_birth') ? 'has-error' : '' }}">
					<label for="date_birth">Nacimiento</label>
					<input type="date" name="date_birth" class="form-control" value="{{ old('date_birth') }}" />
					@if( $errors->has('date_birth'))
						<span class="help-block">
							<strong>{{ $errors->first('date_birth') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
					<label for="date_birth">Sexo </label>
					<label class="radio-inline"><input type="radio" name="sex" value="{{ old('sex') }}" >Masculino</label>
					<label class="radio-inline"><input type="radio" name="sex" value="{{ old('sex') }}" >Femenino</label>
					@if( $errors->has('sex'))
						<span class="help-block">
							<strong>{{ $errors->first('sex') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Correo electronico</label>
					<input type="email" name="email" class="form-control" value="{{ old('email') }}" />
					@if( $errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('blood_types_id') ? 'has-error' : '' }}">
					<label for="blood_types_id">Tipo de sangre</label>
					<select name="blood_types_id" class="form-control" >
						<option value="{{ old('blood_types_id') }}">{{ old('blood_types_id') }}</option>
					</select>
					@if( $errors->has('blood_types_id'))
						<span class="help-block">
							<strong>{{ $errors->first('blood_types_id') }}</strong>
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