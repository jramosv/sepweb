@extends('layout.admin.admin')
@section('titulo', 'Editar Enfermera')
@section('contenido')
	<h4>Editar informacion de Hospitalizationes</h4>

	<form action="{{ action('HospitalizationsController@update', ['Hospitalization' => $hospitalization ])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
<div class="form-group {{ $errors->has('input') ? 'has-error' : '' }}">
	<label for="input">Fecha de Entrada</label>
	<input type="date" name="input" class="form-control" value="{{ $hospitalization->input }}" placeholder="Fecha de Entrada" autofocus />
	@if( $errors->has('input'))
		<span class="help-block">
			<strong>{{ $errors->first('input') }}</strong>
		</span>
	@endif
</div>

<div class="form-group {{ $errors->has('output') ? 'has-error' : '' }}">
	<label for="output">Fecha de Salida</label>
	<input type="date" name="output" class="form-control" value="{{ $hospitalization->output }}" placeholder="Fecha de Salida" />
	@if( $errors->has('output'))
		<span class="help-block">
			<strong>{{ $errors->first('output') }}</strong>
		</span>
	@endif
</div>

<div class="form-group {{ $errors->has('room_id') ? 'has-error' : '' }}">
<label for="room_id">Habitacion</label>
<select name="room_id" class="form-control" >
    <option value="0">[ Seleccione una Habitacion ]</option>
    @foreach($habitaciones as $item)
        <option value= {{ $item->id }} {{ ( $habitaciones->room_id ) == $item->id ?'selected' : '' }} > {{ $item->name }} </option>
    @endforeach
</select>
@if( $errors->has('room_id'))
    <span class="help-block">
        <strong>{{ $errors->first('room_id') }}</strong>
    </span>
@endif
</div>

<div class="form-group {{ $errors->has('nurse_id') ? 'has-error' : '' }}">
<label for="nurse_id">Enfermera</label>
<select name="nurse_id" class="form-control" >
    <option value="0">[ Seleccione una Enfermera ]</option>
    @foreach($enfermeras as $item)
        <option value= {{ $item->id }} {{ ( $enfermeras->nurse_id ) == $item->id ?'selected' : '' }} > {{ $item->first_name,'',$item->last_name }} </option>
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
    <option value="0">[ Seleccione un Paciente ]</option>
    @foreach($pacientes as $item)
        <option value= {{ $item->id }} {{ ( $pacientes->patient_id ) == $item->id ?'selected' : '' }} > {{ $item->first_name,'',$item->last_name }} </option>
    @endforeach
</select>
@if( $errors->has('patient_id'))
    <span class="help-block">
        <strong>{{ $errors->first('patient_id') }}</strong>
    </span>
@endif
</div>


<div class="form-group {{ $errors->has('procedure_id') ? 'has-error' : '' }}">
<label for="procedure_id">Razon</label>
<select name="procedure_id" class="form-control" >
    <option value="0">[ Seleccione un Paciente ]</option>
    @foreach($procedimientos as $item)
        <option value= {{ $item->id }} {{ ( $procedimientos->procedure_id ) == $item->id ?'selected' : '' }} > {{ $item->reason }} </option>
    @endforeach
</select>
@if( $errors->has('procedure_id'))
    <span class="help-block">
        <strong>{{ $errors->first('procedure_id') }}</strong>
    </span>
@endif
</div>

<input type="submit" class="btn btn-primary" value="Actualizar">
</form>
@endsection