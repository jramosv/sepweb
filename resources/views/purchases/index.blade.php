@extends('layout.admin.admin')
@section('titulo', 'Compras')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Lista</small></h2><a href="/compras/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nueva compra</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Proveedor</th>
				<th>Documento</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($purchases as $purchase)
				@if($purchase->isActive == 0)
					<tr class="danger">
						<td width="20px">{{ $purchase->id }}</td>
						<td width="50px">{{ $purchase->date }}</td>
						<td>{{ $purchase->tradename }}</td>
						<td>{{ $purchase->document_type . ': ' . $purchase->document_serie . ' - ' . $purchase->document_no }}</td>
						<td width="100px" align="right">{{ $purchase->total }}</td>
						<td width="50px">{{ $purchase->isActive }}</td>
						<td width="122px">
							<a href="/compras/{{ $purchase->id }}" class="btn btn-warning btn-xs">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
							<form id="delete-form"  action="{{ action('PurchasesController@destroy', ['purchase' => $purchase ])}}" method="POST" style="display: inline;">
	                        	{{ csrf_field() }}
	                        	{{ method_field('DELETE') }}
	                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
	                        </form>
						</td>
					</tr>
				@elseif($purchase->isActive == 1)
					<tr>
						<td width="20px">{{ $purchase->id }}</td>
						<td width="50px">{{ $purchase->date }}</td>
						<td>{{ $purchase->tradename }}</td>
						<td>{{ $purchase->document_type }}</td>
						<td width="50" >{{ $purchase->document_serie }}</td>
						<td width="30" align="right">{{ $purchase->document_no }}</td>
						<td width="100" align="right">{{ $purchase->total }}</td>
						<td width="50" >{{ $purchase->isActive }}</td>
						<td width="122px">
							<a href="/compras/{{ $purchase->id }}" class="btn btn-warning btn-xs">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
							<form id="delete-form"  action="{{ action('PurchasesController@destroy', ['purchase' => $purchase ])}}" method="POST" style="display: inline;">
	                        	{{ csrf_field() }}
	                        	{{ method_field('DELETE') }}
	                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
	                        </form>
						</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
@endsection

@section('script')
<script type="text/javascript" >

</script>
@endsection