<form method="POST" action="/doctores">

	<h4>Crear paciente</h4>
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

				<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
					<label for="address">Direccion</label>
					<input type="text" name="address" class="form-control" value="{{ old('address') }}" />
					@if( $errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
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

				<div class="form-group {{ $errors->has('speciality_id') ? 'has-error' : '' }}">
					<label for="speciality_id">Especialidad</label>
					<select name="speciality_id" class="form-control" >
						<option value="{{ old('speciality_id') }}">{{ old('speciality_id') }}</option>
					</select>
					@if( $errors->has('speciality_id'))
						<span class="help-block">
							<strong>{{ $errors->first('speciality_id') }}</strong>
						</span>
					@endif
				</div>
			<div>
				<input type="submit" class="btn btn-primary" value="Guardar">
            </div>
</form>