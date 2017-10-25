@extends('layout.admin.admin')

@section('contenido')
	<h2 style="display: inline-block;"><small>Prescripciones</small></h2><a href="/prescripciones/crear" class="btn btn-success btn-sm pull-right" >Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Medicamento</th>
				<th>Dosis</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($prescriptions as $prescription)
				<tr>
					<td width="20px">{{ $prescription->id }}</td>
					{{--  <td>{{ $prescription->medicamento ->name }}</td>  --}}
					<td>{{ $prescription->dose }}</td>
					<td width="120px">
						<a href="#" class="btn btn-primary btn-xs">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/prescripciones/{{ $prescription->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="#"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="btn btn-danger btn-xs">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</a>

                        <form id="delete-form" action="{{ action('PrescriptionsController@destroy', ['prescription' => $prescription ])}}" method="POST" style="display: none;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
				</tr>
			@endforeach
		</tbody>
	</table>
	@include('patients.modals.create')
@endsection