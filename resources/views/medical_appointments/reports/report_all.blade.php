@extends('layout.reports.reports_main')
@section('titulo', 'Listado de Citas')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
				<th>Fecha de Cita</th>
				<th>Hora Programada</th>
				<th>Estado de cita</th>
				<th>Doctor</th>
				<th>Paciente</th>
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $cita)
			<tr>
				<td>{{ $cita->id }}</td>
				<td>{{ $cita->date }}</td>
				<td>{{ $cita->time }}</td>
				<td>{{ $cita->estadoCita->status_name }}</td>
				<td>{{ $cita->doctor->last_name }}</td>
				<td>{{ $cita->paciente->last_name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection