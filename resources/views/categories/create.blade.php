@extends('layout.admin.admin')
@section('titulo', 'Categoría')
@section('contenido')
	<h4>Agregar</h4>

	<form method="POST" action="/categorias">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nombre" autofocus />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label for="description">Descripción</label>
			<textarea name="description" class="form-control" placeholder="Descripción">{{ old('description') }}</textarea>
			@if( $errors->has('description'))
				<span class="help-block">
					<strong>{{ $errors->first('description') }}</strong>
				</span>
			@endif
		</div>

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection