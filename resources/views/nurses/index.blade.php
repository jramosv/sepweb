@extends('layout.admin.admin')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Enfermeras</small></h2><a href="/enfermeras/crear" class="btn btn-success btn-sm pull-right" >Nuevo enfermero</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nurses as $nurse)
				<tr>
					<td width="20px">{{ $nurse->id }}</td>
					<td>{{ $nurse->first_name . ' ' . $nurse->last_name }}</td>
					<td>{{ $nurse->phone }}</td>
					<td>{{ $nurse->address }}</td>
					<td width="120px">
					<a href="#" class="btn btn-primary btn-xs">
						<i class="fa fa-user-md" aria-hidden="true"></i>
					</a>
					<a href="/enfermeras/{{ $nurse->id }}" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<a href="#"
					   onclick="event.preventDefault();
								document.getElementById('delete-form').submit();" class="btn btn-danger btn-xs">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>

					<form id="delete-form" action="{{ action('NursesController@destroy', ['nurse' => $nurse ])}}" method="POST" style="display: none;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					</form>
					</td>				
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection