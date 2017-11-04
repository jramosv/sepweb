@extends('layout.reports.reports_main')
@section('titulo', 'Listado de hospitalizaciones')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
                <th>Entrada</th>
                <th>Paciente</th>
                <th>Habitacion</th>
                <th>Enfermera</th>
                <th>Salida</th>
				<th width="100px">Procedimiento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($hospitalizations as $hospitalization)
			<tr>
				<td>{{ $hospitalization->id }}</td>
				<td>{{ $hospitalization->input }}</td>
				<td>{{ $hospitalization->patient_id }}</td>
				<td>{{ $hospitalization->Room->name }}</td>>
				<td>{{ $hospitalization->Nurse->first_name}}</td>
				<td>{{ $hospitalization->output }}</td>
				<td>{{ $hospitalization->procedure->reason }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection