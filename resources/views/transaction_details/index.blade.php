@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Transactions</small></h2><a href="/detalletransacciones/crear" class="btn btn-success btn-sm pull-right" >Nuevo registro</a>
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
					<td width="120px">
						<a href="#" class="btn btn-primary btn-xs">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/detalletransacciones/{{ $transaction_detail->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					<form id="delete-form"  action="{{ action('TransactionDetailsController@destroy', ['transaction_detail' => $transaction_detail ])}}" method="POST" style="display: inline;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>                       
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection