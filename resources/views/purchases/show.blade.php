@extends('layout.admin.admin')
@section('titulo', 'Compras')
@section('contenido')
	<h4>Mostrar</h4>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for="provider_id">Proveedor</label>
					<p>{{ $purchase->tradename }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_type">Tipo de documento</label>
					<p>{{ $purchase->document_type }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_serie">Serie documento</label>
					<p>{{ $purchase->document_serie }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_no">No. documento</label>
					<p>{{ $purchase->document_no }}</p>
				</div>				
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="date">Fecha de compra</label>
					<p>{{ $purchase->date }}</p>
				</div>								
			</div>
			@if($purchase->isActive == 0)
				<div class="col-md-12 col-md-12">
					<div class="form-group">
						<label for="date">Estado de la compra</label>
						<div class="alert alert-warning">
						    <p>La compra ha sido anulada con anterioridad.</p>
						</div>
					</div>								
				</div>
			@endif
		</div><!-- fin de maestro-->

		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					
					<div class="col-md-12 col-xs-12">
						<table id="detalles" class="table table-hover">
							<thead class="bg-info">
								<tr>
									<th class="text-center">Producto</th>
									<th class="text-center" width="100px">Cantidad</th>
									<th class="text-center" width="100px">P. Compra</th>
									<th class="text-center" width="100px">P. Venta</th>
									<th class="text-center" width="150px">Sub-total</th>
								</tr>
							</thead>
							<tfoot class="bg-info">
								<tr>
									<th colspan="4" class="text-right"><h5>Total</h5></th>
									<th><h5 class="text-right" id="total">Q. {{ $purchase->total }}</h5></th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($purchase_details as $pd)
									<tr>
										<th>{{ $pd->product }}</th>
										<th class="text-right">{{ $pd->quantity }}</th>
										<th class="text-right">Q. {{ $pd->purchase_price }}</th>
										<th class="text-right">Q. {{ $pd->sale_price }}</th>
										<th class="text-right">Q. {{ $pd->quantity * $pd->purchase_price }}</th>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		
@endsection

