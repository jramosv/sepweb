@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Categorías</small></h2><a href="/categorias/crear" class="btn btn-success btn-sm pull-right" >Nueva categoria</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Decripción</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td width="20px">{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->description }}</td>
					<td width="120px">
						<a href="#" class="btn btn-primary btn-xs">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/categorias/{{ $category->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="#"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="btn btn-danger btn-xs">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</a>

                        <form id="delete-form" action="{{ action('CategoriesController@destroy', ['category' => $category ])}}" method="POST" style="display: none;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        </form>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $categories->render() }}
@endsection