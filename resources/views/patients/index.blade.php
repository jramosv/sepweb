@extends('layout.admin.admin')
@section('titulo', 'Pacientes')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Pacientes</small></h2><a href="/pacientes/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre de paciente</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Naciemiento</th>
				<th>Sexo</th>
				<th>Email</th>
				<th>Tipo Sangre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($patients as $patient)
				<tr>
					<td width="20px">{{ $patient->id }}</td>
					<td>{{ $patient->full_name }}</td>
					<td>{{ $patient->address }}</td>
					<td>{{ $patient->phone }}</td>
					<td>{{ $patient->date_birth }}</td>
					<td>{{ $patient->sex }}</td>
					<td>{{ $patient->email }}</td>
					<td>{{ $patient->tiposangre->type }}</td>
					<td width="122px">
						<a href="#" class="btn btn-primary btn-xs" onclick="event.preventDefault();
                                    alert('TODO: Aqui se mostrara el historial clinico del paciente.');">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/pacientes/{{ $patient->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<form id="delete-form"  action="{{ action('PatientController@destroy', ['patient' => $patient ])}}" method="POST" style="display: inline;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $patients->render() !!}
@endsection