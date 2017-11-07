@extends('layout.admin.admin')
@section('titulo', 'Crear Cita')
@section('contenido')
	<h4>Crear Cita Medica</h4>

	<form method="POST" action="/citas">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
			<label for="date">Fecha de cita</label>
			<input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="Fecha de Cita" autofocus />
			@if( $errors->has('date'))
				<span class="help-block">
					<strong>{{ $errors->first('date') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
			<label for="time">Hora</label>
			<input type="time" name="time" class="form-control" value="{{ old('time') }}" placeholder="Hora de Cita" />
			@if( $errors->has('time'))
				<span class="help-block">
					<strong>{{ $errors->first('time') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
			<label for="patient_id">Paciente</label>
			<select name="patient_id" class="form-control" >
				<option value="0">[ Seleccione un Paciente ]</option>
				@foreach($pacientes as $item)
					<option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{ $item->first_name.' '.$item->last_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
				</span>
			@endif
		</div>


		<div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
			<label for="doctor_id">Doctor</label>
			<select name="doctor_id" class="form-control" >
				<option value="0">[ Seleccione un Doctor ]</option>
				@foreach($doctores as $item)
					<option value= {{ $item->id }} {{ (old('doctor_id') == $item->id ?'selected' : '') }} > {{ $item->first_name.' '.$item->last_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('doctor_id'))
				<span class="help-block">
					<strong>{{ $errors->first('doctor_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('appointment_status_id') ? 'has-error' : '' }}">
			<label for="appointment_status_id">Estado de Cita</label>
			<select name="appointment_status_id" class="form-control" >
				<option value="0">[ Seleccione un Estado ]</option>
				@foreach($estados_cita as $item)
					<option value= {{ $item->id }} {{ (old('appointment_status_id') == $item->id ?'selected' : '') }} > {{ $item->status_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('appointment_status_id'))
				<span class="help-block">
					<strong>{{ $errors->first('appointment_status_id') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection