@extends('layout.admin.admin')
@section('titulo', 'Hospitalizaciones')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Hospitalizaciones</small></h2><a href="/hospitalizaciones/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro</a> <a href="/hospitalizaciones_todos_pdf" class="btn btn-danger btn-sm pull-right" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listado de Hospitalizaciones... </a>
		<table id="hospitalizations-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Paciente</th>
                <th>Habitacion</th>
                <th>Enfermera</th>
                <th>Procedimiento</th>
                <th>Acciones</th>
			</tr>
        </thead>
        <tfoot>
            <tr>
				<th>#</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Paciente</th>
                <th>Habitacion</th>
                <th>Enfermera</th>
                <th>Procedimiento</th>
                <th>Acciones</th>
			</tr>
			</tr>
        </tfoot>
    </table>
@endsection

@section('script')
<script type="text/javascript" >
	
	$(function() {
       $('#hospitalizations-table').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'lBfrtip',
            ajax: '{{ url('/hospitalizaciones_lista') }}',
            "buttons": [
	            {
	                extend: 'collection',
	                text: 'Exportar a',
	                buttons: [
	                    'copy',
	                    'excel',
	                    'csv',
	                    'pdf',
	                    'print'
	                ]
	            }
        	],
            "columns": [
            { "data": "id" },
            { "data": "input" },
            { "data": "output" },
            { "data": "last_name" },
            { "data": "name" },
            { "data": "first_name" },
            { "data": "reason" },
			
        	{
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-primary btn-xs" href="/hospitalizaciones/' + row.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form id="delete-form"  action="/hospitalizaciones/' + row.id + '" method="POST" style="display: inline;">{{ csrf_field() }}{{ method_field("DELETE") }}<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                },
	        },
	        
        ]});
    });

</script>
@endsection