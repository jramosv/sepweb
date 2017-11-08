@extends('layout.reports.reports_main')
@section('titulo', 'Listado de Diagnosticos')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
				<th>Cita</th>
				<th>Nombre del paciente</th>
				<th>Sintoma</th>
				<th>Tratamiento</th>
				<th>Diagnostico</th>
			</tr>
		</thead>
		<tbody>
			@foreach($diagnosticos as $diagnostico)
			<tr>
				<td>{{ $diagnostico->id }}</td>
				<td>{{ $diagnostico->cita->id }}</td>
				<td>{{ $diagnostico->paciente->last_name }}</td>
				<td>{{ $diagnostico->symptom }}</td>
				<td>{{ $diagnostico->treatment }}</td>
				<td>{{ $diagnostico->diagnosis }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection