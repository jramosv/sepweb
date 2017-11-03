@extends('layout.admin.admin')
@section('titulo', 'Nueva Hospitalización')
@section('contenido')
	<h4>Agregar Nueva Hospitalización</h4>

	<form method="POST" action="/hospitalizaciones">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('input') ? 'has-error' : '' }}">
			<label for="input">Entrada</label>
			<input type="date" name="input" class="form-control" value="{{ old('input') }}" autofocus />
			@if( $errors->has('input'))
				<span class="help-block">
					<strong>{{ $errors->first('input') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('output') ? 'has-error' : '' }}">
			<label for="output">Salida</label>
			<input type="date" name="output" class="form-control" value="{{ old('output') }}" />
			@if( $errors->has('output'))
				<span class="help-block">
					<strong>{{ $errors->first('output') }}</strong>
				</span>
			@endif
		</div>

        		<div class="form-group {{ $errors->has('room_id') ? 'has-error' : '' }}">
			<label for="room_id">Habitación</label>
			<select name="room_id" class="form-control" >
				<option value="0">[ Seleccione una habitación ]</option>
				@foreach($habitaciones as $item)
					<option value= {{ $item->id }} {{ (old('room_id') == $item->id ?'selected' : '') }} > {{ $item->name }} </option>
				@endforeach
			</select>
			@if( $errors->has('room_id'))
				<span class="help-block">
					<strong>{{ $errors->first('room_id') }}</strong>
				</span>
			@endif
		</div>

                <div class="form-group {{ $errors->has('procedure_id') ? 'has-error' : '' }}">
			<label for="procedure_id">procedimientos</label>
			<select name="procedure_id" class="form-control" >
				<option value="0">[ Seleccione una procedimiento ]</option>
				@foreach($procedimientos as $item)
					<option value= {{ $item->id }} {{ (old('procedure_id') == $item->id ?'selected' : '') }} > {{ $item->reason }} </option>
				@endforeach
			</select>
			@if( $errors->has('procedure_id'))
				<span class="help-block">
					<strong>{{ $errors->first('procedure_id') }}</strong>
				</span>procedure_id
			@endif
		</div>

                <div class="form-group {{ $errors->has('nurse_id') ? 'has-error' : '' }}">
			<label for="nurse_id">Enfermera</label>
			<select name="nurse_id" class="form-control" >
				<option value="0">[ Seleccione una enfermera ]</option>
				@foreach($enfermeras as $item)
					<option value= {{ $item->id }} {{ (old('nurse_id') == $item->id ?'selected' : '') }} > {{ $item->first_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('nurse_id'))
				<span class="help-block">
					<strong>{{ $errors->first('nurse_id') }}</strong>
				</span>
			@endif
		</div>

             <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
			<label for="patient_id">Paciente</label>
			<select name="patient_id" class="form-control" >
				<option value="0">[ Seleccione una paciente ]</option>
				@foreach($pacientes as $item)
					<option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{ $item->first_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
				</span>
			@endif
		</div>
                                

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection