@extends('layout.admin.admin')
@section('titulo', 'Diagnostico Medico')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Diagnostico Medico</small></h2><a href="/diagnosticos/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Diagnostico</a> <a href="/diagnosticos_todos_pdf" class="btn btn-danger btn-sm pull-right" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listado de diagnosticos... </a>
		<table id="medical_diagnostics-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
				<th>Cita</th>
                <th>Nombre del paciente</th>
				<th>Sintoma</th>
                <th>prescripcion</th>
                <th>Diagnostico</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tfoot>
            <tr>
				<th>#</th>
                <th>Cita</th>
                <th>Nombre del paciente</th>
				<th>Sintoma</th>
                <th>prescripcion</th>
                <th>Diagnostico</th>
				<th>Acciones</th>
                </tr>
			</tr>
        </tfoot>
    </table>
@endsection

@section('script')
<script type="text/javascript" >
	
	$(function() {
        $('#medical_diagnostics-table').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'lBfrtip',
            ajax: '{{ url('/diagnosticos_lista') }}',
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
            { "data": "md" },
            { "data": "last_name" },
            { "data": "symptom" },
            { "data": "treatment" },            
            { "data": "diagnosis" },
        	{
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-primary btn-xs" href="/diagnosticos/' + row.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form id="delete-form"  action="/diagnosticos/' + row.id + '" method="POST" style="display: inline;">{{ csrf_field() }}{{ method_field("DELETE") }}<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                },
	        },
	        
        ]});
    });

</script>
@endsection