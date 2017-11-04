@extends('layout.admin.admin')
@section('titulo', 'Producto')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Lista</small></h2><a href="/productos/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo producto</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Código de barras</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Categoría</th>
				<th>Disponibilidad</th>
				<th>Fecha de vencimiento</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<td width="20px">{{ $product->id }}</td>
					<td width="50px">{{ $product->barcode }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->category->name }}</td>
					<td>{{ $product->stock }}</td>
					<td>{{ $product->due_date }}</td>
					<td width="122px">
						<a href="#" class="btn btn-primary btn-xs" onclick="event.preventDefault();
                                    alert('TODO: Aqui se mostrara el detalle del producto.');">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/productos/{{ $product->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<form id="delete-form"  action="{{ action('ProductsController@destroy', ['product' => $product ])}}" method="POST" style="display: inline;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('script')
<script type="text/javascript" >

</script>
@endsection