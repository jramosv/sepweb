@extends('layout.admin.admin')
@section('titulo', 'Nueva Habitacion')
@section('contenido')
	<h4>Agregar informacion de la habitacion</h4>

	<form method="POST" action="/habitaciones">
		{{ csrf_field() }}
		<div class="form-group col-xs-8 {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nombre" autofocus />
			@if( $errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('bed') ? 'has-error' : '' }}">
        <div class="col-xs-2">
			<label for="bed">No. Cama</label>
			<input type="number" name="bed" class="form-control" value="{{ old('bed') }}" placeholder="No.Cama" min="1" max="100" />
		</div>
		<div class="col-xs-4">
            @if( $errors->has('bed'))
				<span class="help-block">
					<strong>{{ $errors->first('bed') }}</strong>
				</span>
			@endif
			</div>
		</div>
        <div class="form-group col-xs-10">
		<input type="submit" class="btn btn-primary" value="Guardar">
        </div>
	</form>
@endsection