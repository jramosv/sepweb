@extends('layout.admin.admin')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Enfermeras</small></h2><a href="/enfermeras/crear" class="btn btn-success btn-sm pull-right" >Nuevo enfermero</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nurses as $nurse)
				<tr>
					<td width="20px">{{ $nurse->id }}</td>
					<td>{{ $nurse->first_name . ' ' . $nurse->last_name }}</td>
					<td>{{ $nurse->phone }}</td>
					<td>{{ $nurse->address }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection