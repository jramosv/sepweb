@extends('layout.admin.admin')
@section('titulo', 'Editar Detalle de Transaccion')
@section('contenido')
	<h4>Editar informacion de contacto</h4>

	<form action="{{ action('TransactionDetailsController@update', ['transaction_detail' => $transaction_detail ])}}"  method="POST">
		{{ csrf_field() }}
			{{ csrf_method('PUT') }}
		<div class="form-group {{ $errors->has('nit') ? 'has-error' : '' }}">
			<label for="nit">Nit</label>
			<input type="text" name="nit" class="form-control" value="{{ old('nit') }}" placeholder="Nit" autofocus />
			@if( $errors->has('nit'))
				<span class="help-block">
					<strong>{{ $errors->first('nit') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nombre" />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
			<label for="phone">Telefono</label>
			<input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Telefono" />
			@if( $errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('phone') }}</strong>
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

		<input type="submit" class="btn btn-primary" value="Actualizar">
	</form>
@endsection