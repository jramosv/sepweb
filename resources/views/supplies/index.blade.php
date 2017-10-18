@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Transactions</small></h2><a href="/suministros/crear" class="btn btn-success btn-sm pull-right" >Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Detalle</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($supplies as $supply)
				<tr>
					<td width="20px">{{ $supply->id }}</td>
					<td>{{ $supply->name }}</td>
					<td>{{ $supply->quantity }}</td>
					<td>{{ $supply->price }}</td>
					<td>{{ $supply->detail }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection