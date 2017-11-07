@extends('layout.admin.admin')
@section('titulo', 'Pacientes')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Pacientes</small></h2><a href="/pacientes/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo paciente</a> <a href="/pacientes_todos_pdf" class="btn btn-danger btn-sm pull-right" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listado de pacientes... </a>
		<table id="patients-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Sexo</th>
				<th>Email</th>
				<th>Tipo Sangre</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tfoot>
            <tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Sexo</th>
				<th>Email</th>
				<th>Tipo Sangre</th>
				<th>Acciones</th>
			</tr>
        </tfoot>
    </table>
@endsection

@section('script')
<script type="text/javascript" >
	
	$(function() {
        $('#patients-table').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'lBfrtip',
            ajax: '{{ url('/pacientes_lista') }}',
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
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "address" },
            { "data": "phone" },
            { "data": "sex" },
            { "data": "email" },
            { "data": "type" },
        	{
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-primary btn-xs" href="/pacientes/' + row.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form id="delete-form"  action="/pacientes/' + row.id + '" method="POST" style="display: inline;">{{ csrf_field() }}{{ method_field("DELETE") }}<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                },
	        },
	        
        ]});
 		parent.document.getElementsByTagName("body").reload();
    });

function eliminarPaciente(id){
	var id = id;
	var token = $('#token').val();

	    alertify.confirm('SEPWEB', '¿Realmente desea eliminar al paciente?',function(id){ 

	    		$.ajax({
	                 	url: 		'/pacientes/' + id + '',
	                	headers: 	{'X-CSRF-TOKEN': token },
	               		type: 		'DELETE',
	                 	dataType: 	'json',
	                	success:  	function(){
	    				
	    				alertify.success('Paciente eliminado correctamente.' + id); 
	                }
    			});
    	}, 
    	function(id){ 
    		alertify.error('La eliminación ha sido cancelado.' + valor);
    	});
}



</script>
@endsection