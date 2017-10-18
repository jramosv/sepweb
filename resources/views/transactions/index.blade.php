@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Transactions</small></h2><a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#create_patient">Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Cantidad</th>
				<th>Fecha</th>
				<th>Tipo de Transacción</th>
				<th>Detalle de Transacción</th>
				<th>Suministro</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
				<tr>
					<td width="20px">{{ $transaction->id }}</td>
					<td>{{ $transaction->quantity }}</td>
					<td>{{ $transaction->date }}</td>
					<td>{{ $transaction->type_id }}</td>
					<td>{{ $transaction->detail_id }}</td>
					<td>{{ $transaction->supply_id }}</td>
					<td width="180px"> <a href="#" class="btn btn-primary btn-xs">Ver...</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection