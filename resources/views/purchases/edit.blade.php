@extends('layout.admin.admin')
@section('titulo', 'Proveedor')
@section('contenido')
	<h4>Editar</h4>

	<form action="{{ action('ProvidersController@update', ['provider' => $provider ])}}"  method="POST">
		{{ csrf_field() }}
            {{ method_field('PUT') }}
		<div class="form-group {{ $errors->has('tradename') ? 'has-error' : '' }}">
			<label for="tradename">Nombre comercial</label>
			<input type="text" name="tradename" class="form-control" value="{{ $provider->tradename }}" placeholder="Nombre comercial" autofocus />
			@if( $errors->has('tradename'))
				<span class="help-block">
					<strong>{{ $errors->first('tradename') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('commercial_address') ? 'has-error' : '' }}">
			<label for="commercial_address">Dirección comercial</label>
			<textarea name="commercial_address" class="form-control" placeholder="Dirección comercial">{{ $provider->commercial_address }}</textarea>
			@if( $errors->has('commercial_address'))
				<span class="help-block">
					<strong>{{ $errors->first('commercial_address') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('nit') ? 'has-error' : '' }}">
			<label for="nit">NIT</label>
			<input type="text" name="nit" class="form-control" value="{{ $provider->nit }}" placeholder="NIT" />
			@if( $errors->has('nit'))
				<span class="help-block">
					<strong>{{ $errors->first('nit') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="email">E-mail</label>
			<input type="text" name="email" class="form-control" value="{{ $provider->email }}" placeholder="E-mail" />
			@if( $errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
			<label for="phone">Telefono</label>
			<input type="text" name="phone" class="form-control" value="{{ $provider->phone }}" placeholder="Telefono" />
			@if( $errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('phone') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
			<label for="contact_name">Contacto (Nombre)</label>
			<input type="text" name="contact_name" class="form-control" value="{{ $provider->contact_name }}" placeholder="Contacto (Nombre)" />
			@if( $errors->has('contact_name'))
				<span class="help-block">
					<strong>{{ $errors->first('contact_name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('contact_address') ? 'has-error' : '' }}">
			<label for="contact_address">Contacto (Dirección)</label>
			<input type="text" name="contact_address" class="form-control" value="{{ $provider->contact_address }}" placeholder="Contacto (Dirección)" />
			@if( $errors->has('contact_address'))
				<span class="help-block">
					<strong>{{ $errors->first('contact_address') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
			<label for="contact_phone">Contacto (Telefono)</label>
			<input type="text" name="contact_phone" class="form-control" value="{{ $provider->contact_phone }}" placeholder="Contacto (Telefono)" />
			@if( $errors->has('contact_phone'))
				<span class="help-block">
					<strong>{{ $errors->first('contact_phone') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
			<label for="contact_email">Contacto (E-mail)</label>
			<input type="text" name="contact_email" class="form-control" value="{{ $provider->contact_email }}" placeholder="Contacto (E-mail)" />
			@if( $errors->has('contact_email'))
				<span class="help-block">
					<strong>{{ $errors->first('contact_email') }}</strong>
				</span>
			@endif
		</div>

		<input type="submit" class="btn btn-primary" value="Actualizar">
	</form>
@endsection