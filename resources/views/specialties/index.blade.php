@extends('layout.admin.admin')
@section('titulo', 'Especialidades')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Especialidades</small></h2><a href="/especialidades/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo paciente</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Especialidad Medica</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($specialties as $specialty)
				<tr>
					<td width="20px">{{ $specialty->id }}</td>
					<td>{{ $specialty->name }}</td>
					<td width="120px">
						<a href="#" class="btn btn-primary btn-xs">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/especialidades/{{ $specialty->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<a href="#"
                           onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="btn btn-danger btn-xs">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</a>

                        <form id="delete-form" action="{{ action('SpecialtiesController@destroy', ['specialty' => $specialty ])}}" method="POST" style="display: none;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection