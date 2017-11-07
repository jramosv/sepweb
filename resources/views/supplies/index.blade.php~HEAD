@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>suministros</small></h2><a href="/suministros/crear" class="btn btn-success btn-sm pull-right" >Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Detalle</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($supplies as $supply)
				<tr>
					<td width="20px">{{ $supply->id }}</td>
					<td>{{ $supply->name }}</td>
					<td>{{ $supply->quantity }}</td>
					<td>{{ $supply->price }}</td>
					<td>{{ $supply->detail }}</td>
					<td width="120px">
						<a href="#" class="btn btn-primary btn-xs">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/suministros/{{ $supply->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="#"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="btn btn-danger btn-xs">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</a>

                        <form id="delete-form" action="{{ action('SuppliesController@destroy', ['supply' => $supply ])}}" method="POST" style="display: none;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection