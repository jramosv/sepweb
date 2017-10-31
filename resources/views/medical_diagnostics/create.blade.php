@extends('layout.admin.admin')
@section('titulo', 'Crear Diagnostico')
@section('contenido')
	<h4>Crear Diagnostico</h4>

	<form method="POST" action="/diagnisticos">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('medical_appointment_id') ? 'has-error' : '' }}">
					<label for="medical_appointment_id">Cita</label>
					<select name="medical_appointment_id" class="form-control" >
						<option value="0">[ Seleccione una Cita ]</option>
						@foreach($citas as $item)
							<option value= {{ $item->id }} {{ (old('medical_appointment_id') == $item->id ?'selected' : '') }} > {{ $item->id }} </option>
						@endforeach
					</select>
					@if( $errors->has('medical_appointment_id'))
						<span class="help-block">
							<strong>{{ $errors->first('medical_appointment_id') }}</strong>
						</span>
					@endif
				</div>

		<div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
			<label for="patient_id">Paciente</label>
			<select name="patient_id" class="form-control" >
				<option value="0">[ Seleccione un Paciente ]</option>
				@foreach($pacientes as $item)
					<option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{ $item->id }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group {{ $errors->has('symptom') ? 'has-error' : '' }}">
			<label for="symptom">Hora</label>
			<input type="text" name="symptom" class="form-control" value="{{ old('symptom') }}" placeholder="Hora de Cita" />
			@if( $errors->has('symptom'))
				<span class="help-block">
					<strong>{{ $errors->first('symptom') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
			<label for="patient_id">Paciente</label>
			<select name="patient_id" class="form-control" >
				<option value="0">[ Seleccione un Paciente ]</option>
				@foreach($pacientes as $item)
					<option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{ $item->id }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
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

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection