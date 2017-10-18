@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Doctores</small></h2><a href="/doctors/create" class="btn btn-success btn-sm pull-right">Nuevo Doctor</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Especialidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($doctors as $doctor)
				<tr>
					<td width="20px">{{ $doctor->id }}</td>
					<td>{{ $doctor->first_name . ' ' . $doctor->last_name }}</td>
					<td>{{ $doctor->address }}</td>
					<td>{{ $doctor->phone }}</td>
					<td>{{ $doctor->speciality->type }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('doctors.create')
@endsection