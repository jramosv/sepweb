@extends('layout.admin.admin')
@section('titulo', 'Editar Enfermera')
@section('contenido')
	<h4>Editar informacion de la enfermera</h4>

	<form action="{{ action('NursesController@update', ['nurse' => $nurse ])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
	<label for="first_name">Nombre</label>
	<input type="text" name="first_name" class="form-control" value="{{ $nurse->first_name }}" placeholder="Nombre del paciente" autofocus />
	@if( $errors->has('first_name'))
		<span class="help-block">
			<strong>{{ $errors->first('first_name') }}</strong>
		</span>
	@endif
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
	<label for="last_name">Apellidos</label>
	<input type="text" name="last_name" class="form-control" value="{{ $nurse->last_name }}" placeholder="Apellidos del paciente" />
	@if( $errors->has('last_name'))
		<span class="help-block">
			<strong>{{ $errors->first('last_name') }}</strong>
		</span>
	@endif
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	<label for="address">Dirección</label>
	<input type="text" name="address" class="form-control" placeholder="Dirección" value="{{ $nurse->address }}" />
	@if( $errors->has('address'))
		<span class="help-block">
			<strong>{{ $errors->first('address') }}</strong>
		</span>
	@endif
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	<label for="phone">Telefono</label>
	<input type="text" name="phone" class="form-control" placeholder="Telefono" value="{{ $nurse->phone }}" />
	@if( $errors->has('phone'))
		<span class="help-block">
			<strong>{{ $errors->first('phone') }}</strong>
		</span>
	@endif
</div>
<input type="submit" class="btn btn-primary" value="Actualizar">
</form>
@endsection