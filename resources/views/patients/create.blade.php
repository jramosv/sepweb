@extends('layout.admin.admin')
@section('titulo', 'Crear paciente')
@section('contenido')
	<h4>Crear paciente</h4>

	<form method="POST" action="/pacientes">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
			<label for="first_name">Nombre</label>
			<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Nombre del paciente" autofocus />
			@if( $errors->has('first_name'))
				<span class="help-block">
					<strong>{{ $errors->first('first_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
			<label for="last_name">Apellidos</label>
			<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Apellidos del paciente" />
			@if( $errors->has('last_name'))
				<span class="help-block">
					<strong>{{ $errors->first('last_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('date_birth') ? 'has-error' : '' }}">
			<label for="date_birth">Nacimiento</label>
			<input type="date" name="date_birth" class="form-control" value="{{ old('date_birth') }}" placeholder="Fecha de nacimiento" />
			@if( $errors->has('date_birth'))
				<span class="help-block">
					<strong>{{ $errors->first('date_birth') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
			<label for="sex">Sexo </label>
			<br />
				<label for="sex"><input type="radio" name="sex" value="Masculino" checked > Masculino</label>
				<br />
				<label for="sex"><input type="radio" name="sex" value="Femenino" > Femenino</label>
			@if( $errors->has('sex'))
				<span class="help-block">
					<strong>{{ $errors->first('sex') }}</strong>
				</span>
			@endif
		</div> 

		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="email">Correo electronico</label>
			<input type="email" name="email" class="form-control" placeholder="tucorreo@tuempresa.com" value="{{ old('email') }}" />
			@if( $errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('blood_types_id') ? 'has-error' : '' }}">
			<label for="blood_types_id">Tipo de sangre</label>
			<select name="blood_types_id" class="form-control" >
				<option value="-1">[ Seleccione un tipo ]</option>
				@foreach($tipos_sangre as $item)
					<option value="{{ $item->id }}">{{  $item->type }}</option>
				@endforeach
			</select>
			@if( $errors->has('blood_types_id'))
				<span class="help-block">
					<strong>{{ $errors->first('blood_types_id') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection