@extends('layout.admin.admin')
@section('titulo', 'Hospitalizacion')
@section('contenido')
	<h4>Crear Hospitalizacion </h4>

	<form method="POST" action="/hospitalizaciones">
		{{ csrf_field() }}
        <div class="row form-group">
		<div class=" {{ $errors->has('input') ? 'has-error' : '' }}">
        <div class="col-xs-4">
			<label for="input">Entrada</label>
			<input type="date" name="input" class="form-control" value="{{ old('input') }}" placeholder="Fecha de entrada"  />
		</div>
        <div class="col-xs-2">
            @if( $errors->has('input'))
				<span class="help-block">
					<strong>{{ $errors->first('input') }}</strong>
				</span>
			@endif
            </div>
		</div>
        
        <div class=" {{ $errors->has('output') ? 'has-error' : '' }}">
        <div class="col-xs-4">
			<label for="output">Salida</label>
			<input type="date" name="output" class="form-control" placeholder="Fecha de Salida" value="{{ old('output') }}" />
		</div>
            <div class="col-xs-2">
            @if( $errors->has('output'))
				<span class="help-block">
					<strong>{{ $errors->first('output') }}</strong>
				</span>
			@endif
        </div>
		</div>
        </div>
        </div>
        
        <div class="form-group">
		<div class=" {{ $errors->has('patient_id') ? 'has-error' : '' }}">
        <div class="col-xs-10">
        <label for="patient_id">Paciente</label>
        <select name="patient_id" class="form-control" >
            <option value="0">[ Seleccione un tipo ]</option>
            @foreach($pacientes as $item)
                <option value= {{ $item->id }} {{ (old('patient_id') == $item->id ?'selected' : '') }} > {{ $item->first_name,'',$item->last_name }} </option>
            @endforeach
        </select>
        </div>
        @if( $errors->has('patient_id'))
            <span class="help-block">
                <strong>{{ $errors->first('patient_id') }}</strong>
            </span>
        @endif
    </div>

    <div class=" {{ $errors->has('room_id') ? 'has-error' : '' }}">
    <div class="col-xs-10">
        <label for="room_id">Habitacion</label>
        <select name="room_id" class="form-control" >
            <option value="0">[ Seleccione un tipo ]</option>
            @foreach($habitaciones as $item)
                <option value= {{ $item->id }} {{ (old('room_id') == $item->id ?'selected' : '') }} > {{ $item->name }} </option>
            @endforeach
        </select>
        </div>
        @if( $errors->has('room_id'))
            <span class="help-block">
                <strong>{{ $errors->first('room_id') }}</strong>
            </span>
        @endif
    </div>

    <div class=" {{ $errors->has('nurse_id') ? 'has-error' : '' }}">
    <div class="col-xs-10">
        <label for="nurse_id">Enfermera</label>
        <select name="nurse_id" class="form-control" >
            <option value="0">[ Seleccione un tipo ]</option>
            @foreach($enfermeras as $item)
                <option value= {{ $item->id }} {{ (old('nurse_id') == $item->id ?'selected' : '') }} > {{ $item->first_name }} </option>
            @endforeach
        </select>
        </div>
        @if( $errors->has('nurse_id'))
            <span class="help-block">
                <strong>{{ $errors->first('nurse_id') }}</strong>
            </span>
        @endif
    </div>
    <div class=" {{ $errors->has('procedure_id') ? 'has-error' : '' }}">
    <div class="col-xs-10">
        <label for="procedure_id">Habitacion</label>
        <select name="procedure_id" class="form-control" >
            <option value="0">[ Seleccione una razon ]</option>
            @foreach($procedimientos as $item)
                <option value= {{ $item->id }} {{ (old('procedure_id') == $item->id ?'selected' : '') }} > {{ $item->reason }} </option>
            @endforeach
        </select>
        </div>
        @if( $errors->has('procedure_id'))
            <span class="help-block">
                <strong>{{ $errors->first('procedure_id') }}</strong>
            </span>
        @endif
    </div>

        
		<div class="col-xs-10">
		<input  type="submit" class="btn btn-primary" value="Guardar">
        
        </div>
        
       
        
	</form>
@endsection