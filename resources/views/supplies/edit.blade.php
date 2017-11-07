@extends('layout.admin.admin')
@section('titulo', 'Editar el suministro')
@section('contenido')
	<h4>Editar Suministro</h4>

	<form action="{{ action('SuppliesController@update', ['supply' => $supply ])}}"  method="POST">
		{{ csrf_field() }}
            {{ method_field('PUT') }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{  $supply->name }}" placeholder="Nombre" autofocus />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
			<label for="quantity">Cantidad</label>
			<input type="text" name="quantity" class="form-control" value="{{  $supply->quantity }}" placeholder="Cantidad" />
			@if( $errors->has('quantity'))
				<span class="help-block">
					<strong>{{ $errors->first('quantity') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
			<label for="price">Precio</label>
			<input type="text" name="price" class="form-control" value="{{  $supply->price }}" placeholder="Precio" />
			@if( $errors->has('price'))
				<span class="help-block">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
			<label for="detail">Detalle</label>
			<input type="text" name="detail" class="form-control" placeholder="Detalle" value="{{  $supply->detail }}" />
			@if( $errors->has('detail'))
				<span class="help-block">
					<strong>{{ $errors->first('detail') }}</strong>
				</span>
			@endif
		</div>

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection