@extends('layout.admin.admin')
@section('titulo', 'Recetas')
@section('contenido')
	<h4>Mostrar</h4>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for="provider_id">Paciente</label>
					<p>{{ $sale->patient }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_type">Tipo de documento</label>
					<p>{{ $sale->document_type }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_serie">Serie documento</label>
					<p>{{ $sale->document_serie }}</p>
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="document_no">No. documento</label>
					<p>{{ $sale->document_no }}</p>
				</div>				
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group">
					<label for="date">Fecha de receta</label>
					<p>{{ $sale->date }}</p>
				</div>								
			</div>
			@if($sale->isActive == 0)
				<div class="col-md-12 col-md-12">
					<div class="form-group">
						<label for="date">Estado de la receta</label>
						<div class="alert alert-warning">
						    <p>La receta ha sido anulada con anterioridad.</p>
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
									<th class="text-center" width="100px">P. Venta</th>
									<th class="text-center" width="100px">Descuento</th>
									<th class="text-center" width="150px">Sub-total</th>
								</tr>
							</thead>
							<tfoot class="bg-info">
								<tr>
									<th colspan="4" class="text-right"><h5>Total</h5></th>
									<th><h5 class="text-right" id="total">Q. {{ $sale->total }}</h5></th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($sale_details as $sd)
									<tr>
										<th>{{ $sd->product }}</th>
										<th class="text-right">{{ $sd->quantity }}</th>
										<th class="text-right">Q. {{ $sd->sale_price }}</th>
										<th class="text-right">Q. {{ $sd->discount }}</th>
										<th class="text-right">Q. {{ ($sd->quantity * $sd->sale_price) - $sd->discount }}</th>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		
@endsection

