@extends('layout.reports.reports_main')
@section('titulo', 'Listado de Citas')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
				<th>Cita</th>
				<th>Nombre del paciente</th>
				<th>Sintoma</th>
				<th>Tratamiento</th>
				<th>Paciente</th>
			</tr>
		</thead>
		<tbody>
			@foreach($Diagnosticos as $Diagnostico)
			<tr>
				<td>{{ $Diagnostico->id }}</td>
				<td>{{ $Diagnostico->cita->id }}</td>
				<td>{{ $Diagnostico->paciente->last_name }}</td>
				<td>{{ $Diagnostico->symptom }}</td>
				<td>{{ $Diagnostico->treatment }}</td>
				<td>{{ $Diagnostico->diagnosis }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection