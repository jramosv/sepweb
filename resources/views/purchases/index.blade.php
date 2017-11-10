@extends('layout.admin.admin')
@section('titulo', 'Compras')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Compras</small></h2><a href="/compras/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nueva compra</a> <a href="/compras_todos_pdf" class="btn btn-danger btn-sm pull-right" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Listado de compras... </a>
		<table id="purchase-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>#</th>
				<th>Fecha</th>
                <th>Proveedor</th>
				<th>Tipo de Documento</th>
                <th>No. de serie</th>
                <th>No. de Documento</th>
                <th>Diagnostico</th>
				<th> </th>
			</tr>
        </thead>
        <tfoot>
            <tr>
				<th>#</th>
                <th>Fecha</th>
                <th>Proveedor</th>
				<th>Tipo de Documento</th>
                <th>No. de Serie</th>
                <th>No. de Documento</th>
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
        $('#purchase-table').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'lBfrtip',
            ajax: '{{ url('/compras_lista') }}',
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
            { "data": "tradename" },
            { "data": "document_type" },
            { "data": "document_serie" },            
            { "data": "document_no" },
            { "data": "isActive" },
        	{
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-primary btn-xs" href="/compras/' + row.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form id="delete-form"  action="/compras/' + row.id + '" method="POST" style="display: inline;">{{ csrf_field() }}{{ method_field("DELETE") }}<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                },
	        },
	        
        ]});
    });

</script>
@endsection