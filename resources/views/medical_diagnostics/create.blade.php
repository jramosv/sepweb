@extends('layout.admin.admin')
@section('titulo', 'Diagnosticos')
@section('contenido')
	<h4>Agregar Diagnostico Médico</h4>

	<form method="POST" action="/diagnosticos">
		{{ csrf_field() }}


		
		<div class="form-group {{ $errors->has('medical_appointment_id') ? 'has-error' : '' }}">
			<label for="medical_appointment_id">Codigo de Cita</label>
			<select name="medical_appointment_id" class="form-control" >
				<option value="0">[ Seleccione una cita ]</option>
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
					<option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{  $item->first_name.' '.$item->last_name  }} </option>
				@endforeach
			</select>
			@if( $errors->has('patient_id'))
				<span class="help-block">
					<strong>{{ $errors->first('patient_id') }}</strong>
				</span>
			@endif
		</div>


		<div class="form-group {{ $errors->has('symptom') ? 'has-error' : '' }}">
			<label for="symptom">Sintomas</label>
			
			<textarea name="symptom" class="form-control" placeholder="Sintomas">{{ old('symptom') }}</textarea>
			@if( $errors->has('symptom'))
				<span class="help-block">
					<strong>{{ $errors->first('symptom') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('diagnosis') ? 'has-error' : '' }}">
			<label for="diagnosis">Diagnostico</label>
			<textarea name="diagnosis" class="form-control" placeholder="Diagnostico">{{ old('diagnosis') }}</textarea>
			@if( $errors->has('diagnosis'))
				<span class="help-block">
					<strong>{{ $errors->first('diagnosis') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('treatment') ? 'has-error' : '' }}">
			<label for="treatment">Tratamiento</label>
			<textarea name="treatment" class="form-control" placeholder="Tratamiento">{{ old('treatment') }}</textarea>
			@if( $errors->has('phone'))
				<span class="help-block">
					<strong>{{ $errors->first('treatment') }}</strong>
				</span>
			@endif
		</div>

		<input type="submit" class="btn btn-primary" value="Guardar">
	</form>
@endsection