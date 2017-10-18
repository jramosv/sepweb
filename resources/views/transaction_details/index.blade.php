@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Transactions</small></h2><a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#create_patient">Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>nit</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Dirección</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transaction_details as $transaction_detail)
				<tr>
					<td width="20px">{{ $transaction_detail->id }}</td>
					<td>{{ $transaction_detail->nit }}</td>
					<td>{{ $transaction_detail->name }}</td>
					<td>{{ $transaction_detail->phone }}</td>
					<td>{{ $transaction_detail->address }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection