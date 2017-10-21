@extends('layout.admin.admin')
@section('titulo', 'Editar Especialidad')
@section('contenido')
	<h4>Editar Especialidad Medica</h4>
	<form action="{{ action('SpecialtiesController@update', ['specialty' => $specialty ])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}


<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label for="name">Nombre</label>
	<input type="text" name="name" class="form-control" value="{{ $specialty->name }}" placeholder="Espcialidad Medica" autofocus />
	@if( $errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
	@endif
</div>


<input type="submit" class="btn btn-primary" value="Actualizar">
</form>
@endsection