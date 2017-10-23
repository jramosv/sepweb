@extends('layout.admin.admin')
@section('titulo', 'Nueva Especialidad')
@section('contenido')
	<h4>Agregar Especialidad Medica</h4>

	<form method="POST" action="/especialidades">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Especialidad</label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Especialidad" autofocus />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>


		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection