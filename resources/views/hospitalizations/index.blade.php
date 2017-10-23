@extends('layout.admin.admin')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Hospitalizaciones</small></h2><a href="/hospitalizaciones/crear" class="btn btn-success btn-sm pull-right" >Nuevo hospitalizacion</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
                <th>Entrada</th>
                <th>Paciente</th>
                <th>Habitacion</th>
                <th>Enfermera</th>
                <th>Salida</th>
                <th>Procedimiento</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($hospitalizations as $hospitalization)
				<tr>
					<td width="20px">{{ $hospitalization->id }}</td>
					<td>{{ $hospitalization->input }}</td>
					<td>{{ $hospitalization->patients }}</td>
					<td>{{ $hospitalization->rooms }}</td>
                    <td>{{ $hospitalization->nurses }}</td>

					<td width="122px">
					<a href="#" class="btn btn-primary btn-xs" onclick="event.preventDefault();
								alert('TODO: Aqui se mostrara el historial clinico de la enfermera.');">
						<i class="fa fa-user-md" aria-hidden="true"></i>
					</a>
					<a href="/enfermeras/{{ $nurse->id }}" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<form id="delete-form"  action="{{ action('NursesController@destroy', ['nurse' => $nurse ])}}" method="POST" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $hospitalizations->render() !!}
@endsection