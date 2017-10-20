@extends('layout.admin.admin')
@section('titulo', 'Editar paciente')
@section('contenido')
	<h4>Editar paciente</h4>

<form action="{{ action('PatientController@update', ['patient' => $patient ])}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
		<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
			<label for="first_name">Nombre</label>
			<input type="text" name="first_name" class="form-control" value="{{ $patient->first_name }}" placeholder="Nombre del paciente" autofocus />
			@if( $errors->has('first_name'))
				<span class="help-block">
					<strong>{{ $errors->first('first_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
			<label for="last_name">Apellidos</label>
			<input type="text" name="last_name" class="form-control" value="{{ $patient->last_name }}" placeholder="Apellidos del paciente" />
			@if( $errors->has('last_name'))
				<span class="help-block">
					<strong>{{ $errors->first('last_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
			<label for="address">Dirección</label>
			<input type="text" name="address" class="form-control" placeholder="Dirección" value="{{ $patient->address }}" />
			@if( $errors->has('address'))
				<span class="help-block">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
			<label for="phone">Telefono</label>
			<input type="text" name="phone" class="form-control" placeholder="Telefono" value="{{ $patient->phone }}" />
			@if( $errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('phone') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('date_birth') ? 'has-error' : '' }}">
			<label for="date_birth">Nacimiento</label>
			<input type="date" name="date_birth" class="form-control" value="{{ $patient->date_birth }}" placeholder="Fecha de nacimiento" />
			@if( $errors->has('date_birth'))
				<span class="help-block">
					<strong>{{ $errors->first('date_birth') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
			<label for="sex">Genero </label>
			<br />
			@if($patient->sex == 'Masculino')
				<label for="sex"><input type="radio" name="sex" value="Masculino" checked /> Masculino</label>
				<br />
				<label for="sex"><input type="radio" name="sex" value="Femenino" /> Femenino</label>
				@elseif($patient->sex == 'Femenino')
				<label for="sex"><input type="radio" name="sex" value="Masculino" /> Masculino</label>
				<br />
				<label for="sex"><input type="radio" name="sex" value="Femenino" checked /> Femenino</label>
				@endif
			@if( $errors->has('sex'))
				<span class="help-block">
					<strong>{{ $errors->first('sex') }}</strong>
				</span>
			@endif
		</div> 

		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="email">Correo electronico</label>
			<input type="email" name="email" class="form-control" placeholder="tucorreo@tuempresa.com" value="{{ $patient->email }}" />
			@if( $errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('blood_types_id') ? 'has-error' : '' }}">
			<label for="blood_types_id">Tipo de sangre</label>
			<select name="blood_types_id" class="form-control" >
				<option value="0">[ Seleccione un tipo ]</option>
				@foreach($tipos_sangre as $item)
					<option value= {{ $item->id }} {{ ( $patient->blood_types_id ) == $item->id ?'selected' : '' }} > {{ $item->type }} </option>
				@endforeach
			</select>
			@if( $errors->has('blood_types_id'))
				<span class="help-block">
					<strong>{{ $errors->first('blood_types_id') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Actualizar">
	</form>
@endsection