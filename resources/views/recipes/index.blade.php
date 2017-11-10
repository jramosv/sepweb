@extends('layout.admin.admin')
@section('titulo', 'Recetas')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Lista</small></h2><a href="/recetas/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nueva receta</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Paciente</th>
				<th>Documento</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($recipes as $recipe)
				@if($recipe->isActive == 0)
					<tr class="danger">
						<td width="20px">{{ $recipe->id }}</td>
						<td width="100px">{{ $recipe->date }}</td>
						<td>{{ $recipe->patient }}</td>
						<td>{{ $recipe->document_type . ': ' . $recipe->document_serie . ' - ' . $recipe->document_no }}</td>
						<td width="100px" align="right">{{ $recipe->total }}</td>
						<td width="50px">{{ $recipe->isActive }}</td>
						<td width="122px">
							<a href="/recetas/{{ $recipe->id }}" class="btn btn-warning btn-xs">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
							<form id="delete-form"  action="{{ action('RecipesController@destroy', ['recipe' => $recipe->id ])}}" method="POST" style="display: inline;">
	                        	{{ csrf_field() }}
	                        	{{ method_field('DELETE') }}
	                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
	                        </form>
						</td>
					</tr>
				@elseif($recipe->isActive == 1)
					<tr>
						<td width="20px">{{ $recipe->id }}</td>
						<td width="100px">{{ $recipe->date }}</td>
						<td>{{ $recipe->patient }}</td>
						<td>{{ $recipe->document_type . ': ' . $recipe->document_serie . ' - ' . $recipe->document_no }}</td>
						<td width="100" align="right">{{ $recipe->total }}</td>
						<td width="50" >{{ $recipe->isActive }}</td>
						<td width="122px">
							<a href="/recetas/{{ $recipe->id }}" class="btn btn-warning btn-xs">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
							<form id="delete-form"  action="{{ action('RecipesController@destroy', ['recipe' => $recipe->id ])}}" method="POST" style="display: inline;">
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