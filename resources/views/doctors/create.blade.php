@extends('layout.admin.admin')
@section('titulo', 'Crear Doctor')
@section('contenido')
	<h4>Crear Doctor</h4>

	<form method="POST" action="/doctores">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
			<label for="first_name">Nombre</label>
			<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Nombre del doctor" autofocus />
			@if( $errors->has('first_name'))
				<span class="help-block">
					<strong>{{ $errors->first('first_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
			<label for="last_name">Apellidos</label>
			<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Apellidos del doctor" />
			@if( $errors->has('last_name'))
				<span class="help-block">
					<strong>{{ $errors->first('last_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
			<label for="address">Dirección</label>
			<input type="text" name="address" class="form-control" placeholder="Dirección" value="{{ old('address') }}" />
			@if( $errors->has('address'))
				<span class="help-block">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
			<label for="phone">Telefono</label>
			<input type="text" name="phone" class="form-control" placeholder="Telefono" value="{{ old('phone') }}" />
			@if( $errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('phone') }}</strong>
				</span>
			@endif
		</div>

		

		<div class="form-group {{ $errors->has('speciality_id') ? 'has-error' : '' }}">
			<label for="speciality_id">Especialidad Médica</label>
			<select name="speciality_id" class="form-control" >
				<option value="0">[ Seleccione un tipo ]</option>
				@foreach($especialidades as $item)
					<option value= {{ $item->id }} {{ (old('speciality_id') == $item->id ?'selected' : '') }} > {{ $item->name }} </option>
				@endforeach
			</select>
			@if( $errors->has('speciality_id'))
				<span class="help-block">
					<strong>{{ $errors->first('speciality_id') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection