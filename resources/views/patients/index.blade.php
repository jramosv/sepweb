@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Pacientes</small></h2><a href="#" class="btn btn-success btn-sm pull-right" data-toggle="" data-target="#create_patient">Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre de paciente</th>
				<th>Nacimiento</th>
				<th>Sexo</th>
				<th>Email</th>
				<th>Tipo Sangre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($patients as $patient)
				<tr>
					<td width="20px">{{ $patient->id }}</td>
					<td>{{ $patient->first_name . ' ' . $patient->last_name }}</td>
					<td>{{ $patient->date_birth }}</td>
					<td>{{ $patient->sex }}</td>
					<td>{{ $patient->email }}</td>
					<td>{{ $patient->tiposangre->type }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection