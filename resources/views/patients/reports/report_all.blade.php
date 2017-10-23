@extends('layout.reports.reports_main')
@section('titulo', 'Listado de pacientes')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
				<th>Nombre del paciente</th>
				<th>Dirección</th>
				<th width="100px">Teléfono</th>
				<th width="90px">Genero</th>
				<th width="35px">Tipo de Sangre</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pacientes as $paciente)
			<tr>
				<td>{{ $paciente->id }}</td>
				<td>{{ $paciente->full_name }}</td>
				<td>{{ $paciente->address }}</td>
				<td>{{ $paciente->phone }}</td>
				<td>{{ $paciente->sex }}</td>
				<td>{{ $paciente->tiposangre->type }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection