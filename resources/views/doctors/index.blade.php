@extends('layout.admin.admin')
@section('titulo', 'Doctores')
@section('contenido')


@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Doctores</small></h2><a href="/doctores/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo doctor</a>
	<table class="table table-hover table-bordered table-striped" id='doctorstbl'>
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre del doctor</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Especialidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($doctors as $doctor)
				<tr>
					<td width="20px">{{ $doctor->id }}</td>
					<td>{{ $doctor->first_name . ' ' . $doctor->last_name }}</td>
					<td>{{ $doctor->address }}</td>
					<td>{{ $doctor->phone }}</td>
					<td>{{ $doctor->especialidad->name }}</td>

					<td width="122px">
				
					<a href="/doctores/{{ $doctor->id }}" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<form id="delete-form"  action="{{ action('DoctorsController@destroy', ['doctor' => $doctor ])}}" method="POST" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $doctors->render() !!}


@endsection