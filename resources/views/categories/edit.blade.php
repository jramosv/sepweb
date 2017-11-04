@extends('layout.admin.admin')
@section('titulo', 'Categoría')
@section('contenido')
	<h4>Editar</h4>

	<form action="{{ action('CategoriesController@update', ['category' => $category ])}}"  method="POST">
		{{ csrf_field() }}
            {{ method_field('PUT') }}

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Nombre" autofocus />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label for="description">Descripción</label>
			<textarea name="description" class="form-control" placeholder="Descripción">{{ $category->description }}</textarea>
			@if( $errors->has('description'))
				<span class="help-block">
					<strong>{{ $errors->first('description') }}</strong>
				</span>
			@endif
		</div>

		<input type="submit" class="btn btn-primary" value="Actualizar">
	</form>
@endsection