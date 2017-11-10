@extends('layout.admin.admin')
@section('titulo', 'Recetas')
@section('contenido')
	<h4>Salida de bodega</h4>
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<form method="POST" action="/recetas">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group {{ $errors->has('patient_id') ? 'has-error' : '' }}">
					<label for="patient_id">Paciente</label>
					<select name="patient_id" id="patient_id" class="form-control">
						@foreach($patients as $patient)
							<option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }} </option>
						@endforeach
					</select>
					@if( $errors->has('patient_id'))
						<span class="help-block">
							<strong>{{ $errors->first('patient_id') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6 col-md-12">
				<div class="form-group {{ $errors->has('document_type') ? 'has-error' : '' }}">
					<label for="document_type">Tipo de documento</label>
					<select name="document_type" id="document_type" class="form-control">
						<option value="Receta">Receta</option>
						<option value="Ticket">Ticket</option>
						<option value="Boleta">Boleta</option>
						<option value="Factura">Factura</option>
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
					<input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="Fecha de entrega" />
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
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="pproduct_id">Productos</label>
							<select name="pproduct_id" id="pproduct_id" class="form-control">
								@foreach($products as $product)
									<option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->avg_price }}">{{ $product->product }}</option>
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
					<div class="col-md-1 col-xs-12">
						<div class="form-group">
							<label for="pstock">Stock</label>
							<input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock" />
							@if( $errors->has('stock'))
								<span class="help-block">
									<strong>{{ $errors->first('stock') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-xs-12">
						<div class="form-group">
							<label for="psale_price">Precio de venta</label>
							<input type="number" disabled name="psale_price" id="psale_price" class="form-control" placeholder="Precio de venta" />
							@if( $errors->has('sale_price'))
								<span class="help-block">
									<strong>{{ $errors->first('sale_price') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-2 col-xs-12">
						<div class="form-group">
							<label for="pdiscount">Descuento</label>
							<input type="number" name="pdiscount" id="pdiscount" class="form-control" placeholder="Descuento" />
							@if( $errors->has('discount'))
								<span class="help-block">
									<strong>{{ $errors->first('discount') }}</strong>
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
									<th class="text-center" width="100px">P. Venta</th>
									<th class="text-center" width="100px">Descuento</th>
									<th class="text-center" width="150px">Sub-total</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th colspan="5" class="text-right"><h4>Total</h4></th>
									<th><h4 class="text-right" id="sale_total">Q. 0.00</h4><input type="hidden" name="total" id="total" /></th>
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
		$('#pproduct_id').change(mostrarValores);

		function mostrarValores()
		{
			datosProducto = document.getElementById('pproduct_id').value.split('_');
			$('#pstock').val(datosProducto[1]);
			$('#psale_price').val(datosProducto[2]);
		}

		function agregar(){

			datosProducto = document.getElementById('pproduct_id').value.split('_');
			product_id = datosProducto[0];
			product_name = $('#pproduct_id option:selected').text();
			quantity = $('#pquantity').val();
			discount = $('#pdiscount').val();
			sale_price = $('#psale_price').val();
			stock = $('#pstock').val();

			if(product_id != '' && quantity != '' && quantity > 0 && discount != '' && sale_price != ''){
				if (stock >= quantity) {

					subtotal[cont] = (quantity * sale_price)- discount;
					total = total + subtotal[cont];

					var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar(' + cont + ');"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td><input type="hidden" name="product_id[]" value="' + product_id + '"/><p>' + product_name + '</p></td><td class="text-right"><input type="number" name="quantity[]" class="form-control" value="' + quantity + '"/></td><td class="text-right"><input type="number" name="sale_price[]" class="form-control" value="' + sale_price + '"/></td><td class="text-right"><input type="number" name="discount[]" class="form-control" value="' + discount + '"/></td><td class="text-right">' + subtotal[cont] + '</td></tr>';
					cont++;
					limpiar();
					$('#sale_total').html('Q. ' + total);
					$('#total').val(total);
					evaluar();
					$('#detalles').append(fila);

				}
				else{
					alertify.alert('SEPWEB', 'La cantidad a vender supera el stock, revise su inventario.', function(){ alertify.error('Revise el stock del producto.'); });
				}
			}
			else{
				alertify.alert('SEPWEB', 'Error al ingresar el detalle de la receta, revise los datos del producto.', function(){ alertify.error('Revise el datalle de la receta.'); });
			}
		}

		function limpiar(){
			$('#pquantity').val('');
			$('#pdiscount').val('');
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
		    $("#sale_total").html('Q. ' + total); 
			$('#total').val(total);
		    $("#fila" + index).remove();
		    evaluar();

		}
	</script>
@endsection