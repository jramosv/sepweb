@extends('layout.admin.admin')
@section('titulo', 'Editar paciente')
@section('contenido')
	<h4>Editar Cita Medica</h4>

<form action="{{ action('MedicalAppointmentsController@update', ['medical_appointment' => $medical_appointment ])}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

		<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
			<label for="date">Fecha</label>
			<input type="date" name="date" class="form-control" value="{{ $medical_appointment->date }}" placeholder="Fecha de Cita" autofocus />
			@if( $errors->has('date'))
				<span class="help-block">
					<strong>{{ $errors->first('date') }}</strong>
				</span>
			@endif
		</div>

        <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
			<label for="time">Hora</label>
			<input type="time" name="time" class="form-control" value="{{ $medical_appointment->time }}" placeholder="Hora de Cita" autofocus />
			@if( $errors->has('date'))
				<span class="help-block">
					<strong>{{ $errors->first('time') }}</strong>
				</span>
			@endif
		</div>

        <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
			<label for="patient_id">Nombre de Paciente</label>
			<select name="patient_id" class="form-control" >
				<option value="0">[ Seleccione un Paciente ]</option>
				@foreach($pacientes as $item)
					<option value= {{ $item->id }} {{ ( $medical_appointment->patient_id ) == $item->id ?'selected' : '' }} > {{  $item->first_name.' '. $item->last_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
			<label for="doctor_id">Nombre de Doctor</label>
			<select name="doctor_id" class="form-control" >
				<option value="0">[ Seleccione un Doctor ]</option>
				@foreach($doctores as $item)
					<option value= {{ $item->id }} {{ ( $medical_appointment->doctor_id ) == $item->id ?'selected' : '' }} > {{ $item->first_name.' '. $item->last_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('doctor_id'))
				<span class="help-block">
					<strong>{{ $errors->first('doctor_id') }}</strong>
				</span>
			@endif
		</div>

        <div class="form-group {{ $errors->has('appointment_status_id') ? 'has-error' : '' }}">
			<label for="appointment_status_id">Estado de cita</label>
			<select name="appointment_status_id" class="form-control" >
				<option value="0">[ Seleccione un Estado ]</option>
				@foreach($estados_cita as $item)
					<option value= {{ $item->id }} {{ ( $medical_appointment->appointment_status_id ) == $item->id ?'selected' : '' }} > {{ $item->status_name }} </option>
				@endforeach
			</select>
			@if( $errors->has('appointment_status_id'))
				<span class="help-block">
					<strong>{{ $errors->first('appointment_status_id') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Actualizar">
	</form>
@endsection