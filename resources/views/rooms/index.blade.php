@extends('layout.admin.admin')
@section('titulo', 'Habitaciones')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Habitaciones</small></h2><a href="/habitaciones/crear" class="btn btn-success btn-sm pull-right" >Nueva Habitacion</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Cama</th>
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			@foreach($rooms as $room)
				<tr>
					<td width="20px">{{ $room->id }}</td>
					<td>{{ $room->name }}</td>
					<td>{{ $room->bed }}</td>
					
					<td width="122px">
				
					<a href="/habitaciones/{{ $room->id }}" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<form id="delete-form"  action="{{ action('RoomsController@destroy', ['room' => $room ])}}" method="POST" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $rooms->render() !!}
@endsection