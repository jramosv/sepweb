@extends('layout.admin.admin')
@section('titulo', 'Productos')
@section('contenido')
	<h4>Crear</h4>

	<form method="POST" action="/productos">
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

		<div class="form-group {{ $errors->has('barcode') ? 'has-error' : '' }}">
			<label for="barcode">Codigo de barras</label>
			<input type="text" name="barcode" class="form-control" value="{{ old('barcode') }}" placeholder="Codigo de barras" />
			@if( $errors->has('barcode'))
				<span class="help-block">
					<strong>{{ $errors->first('barcode') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
			<label for="category_id">Categoría</label>
			<select name="category_id" class="form-control" >
				<option value="0">[ Seleccione un tipo ]</option>
				@foreach($categories as $category)
					<option value= {{ $category->id }} {{ (old('category_id') == $category->id ?'selected' : '') }} > {{ $category->name }} </option>
				@endforeach
			</select>
			@if( $errors->has('category_id'))
				<span class="help-block">
					<strong>{{ $errors->first('category_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
			<label for="stock">Cantidad Inicial</label>
			<input type="number" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="Cantidad Inicial" />
			@if( $errors->has('stock'))
				<span class="help-block">
					<strong>{{ $errors->first('stock') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('min_amount') ? 'has-error' : '' }}">
			<label for="min_amount">Cantidad minima</label>
			<input type="number" name="min_amount" class="form-control" value="{{ old('min_amount') }}" placeholder="Cantidad minima" />
			@if( $errors->has('min_amount'))
				<span class="help-block">
					<strong>{{ $errors->first('min_amount') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('max_amount') ? 'has-error' : '' }}">
			<label for="max_amount">Cantidad maxima</label>
			<input type="number" name="max_amount" class="form-control" value="{{ old('max_amount') }}" placeholder="Cantidad maxima" />
			@if( $errors->has('max_amount'))
				<span class="help-block">
					<strong>{{ $errors->first('max_amount') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('due_date') ? 'has-error' : '' }}">
			<label for="due_date">Fecha de vencimiento</label>
			<input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" placeholder="Fecha de vencimiento" />
			@if( $errors->has('due_date'))
				<span class="help-block">
					<strong>{{ $errors->first('due_date') }}</strong>
				</span>
			@endif
		</div>

		<input type="hidden" name="isActive" value="1" />

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection