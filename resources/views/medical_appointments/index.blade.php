@extends('layout.admin.admin')
@section('titulo', 'Citas Medicas')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Citas Medicas</small></h2><a href="/citas/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nueva Cita</a> <a href="/citas_todas_pdf" class="btn btn-danger btn-sm pull-right" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listado de citas medicas... </a>
		<table id="medical_appointments-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Paciente</th>
				<th>Doctor</th>
                <th>Estado de Cita</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tfoot>
            <tr>
				<th>#</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Paciente</th>
				<th>Doctor</th>
                <th>Estado de Cita</th>
				<th>Acciones</th>
			</tr>
        </tfoot>
    </table>
@endsection

@section('script')
<script type="text/javascript" >
	
	$(function() {
        $('#medical_appointments-table').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'lBfrtip',
            ajax: '{{ url('/citas_lista') }}',
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
            { "data": "date" },
            { "data": "time" },
            { "data": "last_name" },
            { "data": "last_name" },
            { "data": "status_name" },
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-primary btn-xs" href="/citas/' + row.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form id="delete-form"  action="/citas/' + row.id + '" method="POST" style="display: inline;">{{ csrf_field() }}{{ method_field("DELETE") }}<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                },
	        },
	        
        ]});
    });

</script>
@endsection