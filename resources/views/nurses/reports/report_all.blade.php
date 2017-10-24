@extends('layout.reports.reports_main')
@section('titulo', 'Listado de Enfermeras')
@section('contenido')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25px">ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Telfono</th>
				<th width="100px">Direccion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nurses as $nurse)
			<tr>
				<td>{{ $nurse->id }}</td>
				<td>{{ $nurse->first_name }}</td>
				<td>{{ $nurse->last_name }}</td>
				<td>{{ $nurse->phone }}</td>
				<td>{{ $nurse->address }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection