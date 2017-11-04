@extends('layout.admin.admin')
@section('titulo', 'Compras')
@section('contenido')
	<h4>Entrada a bodega</h4>

	<form method="POST" action="/compras">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
					<label for="provider_id">Proveedor</label>
					<select name="provider_id" id="provider_id" class="form-control selectpicker" data-live-search="true">
						@foreach($providers as $provider)
							<option value="{{ $provider->id }}">{{ $provider->tradename }}</option>
						@endforeach
					</select>
					@if( $errors->has('provider_id'))
						<span class="help-block">
							<strong>{{ $errors->first('provider_id') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group {{ $errors->has('document_type') ? 'has-error' : '' }}">
					<label for="document_type">Tipo de documento</label>
					<select name="document_type" id="document_type" class="form-control">
						<option value="Factura">Factura</option>
						<option value="Ticket">Ticket</option>
						<option value="Boleta">Boleta</option>
					</select>
					@if( $errors->has('document_type'))
						<span class="help-block">
							<strong>{{ $errors->first('document_type') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group {{ $errors->has('document_serie') ? 'has-error' : '' }}">
					<label for="document_serie">Serie documento</label>
					<input type="text" name="document_serie" class="form-control" value="{{ old('document_serie') }}" placeholder="Serie documento" />
					@if( $errors->has('document_serie'))
						<span class="help-block">
							<strong>{{ $errors->first('document_serie') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group {{ $errors->has('document_no') ? 'has-error' : '' }}">
					<label for="document_no">No. documento</label>
					<input type="number" name="document_no" class="form-control" value="{{ old('document_no') }}" placeholder="No. documento" />
					@if( $errors->has('document_no'))
						<span class="help-block">
							<strong>{{ $errors->first('document_no') }}</strong>
						</span>
					@endif
				</div>				
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
					<label for="date">Fecha de compra</label>
					<input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="Fecha de compra" />
					@if( $errors->has('date'))
						<span class="help-block">
							<strong>{{ $errors->first('date') }}</strong>
						</span>
					@endif
				</div>								
			</div>
		</div><!-- fin de maestro-->

		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-md-5 col-xs-12">
						<div class="form-group">
							<label for="pproduct_id">Productos</label>
							<select name="pproduct_id" id="pproduct_id" class="form-control selectpicker" data-live-search="true">
								@foreach($products as $product)
									<option value="{{ $product->id }}">{{ $product->product }}</option>
								@endforeach
							</select>
							@if( $errors->has('product_id'))
								<span class="help-block">
									<strong>{{ $errors->first('product_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-xs-12">
						<div class="form-group">
							<label for="pquantity">Cantidad</label>
							<input type="number" name="pquantity" id="pquantity" class="form-control" placeholder="Cantidad" />
							@if( $errors->has('quantity'))
								<span class="help-block">
									<strong>{{ $errors->first('quantity') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-xs-12">
						<div class="form-group">
							<label for="ppurchase_price">Precio de compra</label>
							<input type="number" name="ppurchase_price" id="ppurchase_price" class="form-control" placeholder="Precio de compra" />
							@if( $errors->has('purchase_price'))
								<span class="help-block">
									<strong>{{ $errors->first('purchase_price') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-xs-12">
						<div class="form-group">
							<label for="psale_price">Precio de venta</label>
							<input type="number" name="psale_price" id="psale_price" class="form-control" placeholder="Precio de venta" />
							@if( $errors->has('sale_price'))
								<span class="help-block">
									<strong>{{ $errors->first('sale_price') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-1 col-xs-12">
						<div class="form-group">
							<label for="btn_add"></label>
							<button type="button" id="btn_add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
						</div>
					</div>

					<div class="col-md-12 col-xs-12">
						<table id="detalles" class="table table-hover">
							<thead class="bg-info">
								<tr>
									<th class="text-center" width="20px">Opción</th>
									<th class="text-center">Producto</th>
									<th class="text-center" width="100px">Cantidad</th>
									<th class="text-center" width="100px">P. Compra</th>
									<th class="text-center" width="100px">P. Venta</th>
									<th class="text-center" width="150px">Sub-total</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th colspan="5" class="text-right"><h4>Total</h4></th>
									<th><h4 class="text-right" id="total">Q. 000.00</h4></th>
								</tr>
							</tfoot>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-xs-12" id="botones">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="btn btn-primary" value="Guardar">
				<input type="reset" class="btn btn-success" value="Cancelar">
			</div>
		</div>
	</form>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn_add').click(function(){
				agregar();
			});
		});

		var cont = 0;
		total = 0;
		subtotal = [];
		$('#botones').hide();

		function agregar(){
			product_id = $('#pproduct_id').val();
			product_name = $('#pproduct_id option:selected').text();
			quantity = $('#pquantity').val();
			purchase_price = $('#ppurchase_price').val();
			sale_price = $('#psale_price').val();

			if(product_id != '' && quantity != '' && quantity > 0 && purchase_price != '' && sale_price != ''){
				subtotal[cont] = (quantity * purchase_price);
				total = total + subtotal[cont];

				var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar(' + cont + ');"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td><input type="hidden" name="product_id[]" value="' + product_id + '"/><p>' + product_name + '</p></td><td class="text-right"><input type="number" name="quantity[]" value="' + quantity + '"/></td><td class="text-right"><input type="number" name="purchase_price[]" value="' + purchase_price + '"/></td><td class="text-right"><input type="number" name="sale_price[]" value="' + sale_price + '"/></td><td class="text-right">' + subtotal[cont] + '</td></tr>';
				cont++;
				limpiar();
				$('#total').html('Q. ' + total);
				evaluar();
				$('#detalles').append(fila);
			}
			else{
				alertify.alert('SEPWEB', 'Error al ingresar el detalle de la compra, revise los datos del producto.', function(){ alertify.error('Revise el datalle de la compra.'); });
			}
		}

		function limpiar(){
			$('#pquantity').val('');
			$('#ppurchase_price').val('');
			$('#psale_price').val('');
		}

		function evaluar(){
			if(total > 0){
				$('#botones').show();
			}else{
				$('#botones').hide();
			}
		}

		function eliminar(index){
		    total = total - subtotal[index]; 
		    $("#total").html('Q. ' + total);   
		    $("#fila" + index).remove();
		    evaluar();

		}
	</script>
@endsection