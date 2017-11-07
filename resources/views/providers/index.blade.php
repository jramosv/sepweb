@extends('layout.admin.admin')
@section('titulo', 'Proveedor')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
	<h2 style="display: inline-block;"><small>Lista</small></h2><a href="/proveedores/crear" class="btn btn-success btn-sm pull-right" ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo proveedor</a>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>NIT</th>
				<th>Nombre comercial</th>
				<th>Dirección</th>
				<th>E-mail</th>
				<th>Telefono</th>
				<th>Persona de Contacto</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($providers as $provider)
				<tr>
					<td width="20px">{{ $provider->id }}</td>
					<td width="50px">{{ $provider->nit }}</td>
					<td>{{ $provider->tradename }}</td>
					<td>{{ $provider->commercial_address }}</td>
					<td>{{ $provider->email }}</td>
					<td>{{ $provider->phone }}</td>
					<td>{{ $provider->contact_name . ' (' . $provider->contact_phone . ')' }}</td>
					<td width="122px">
						<a href="#" class="btn btn-primary btn-xs" onclick="event.preventDefault();
                                    alert('TODO: Aqui se mostrara el detalle del proveedor.');">
							<i class="fa fa-user-md" aria-hidden="true"></i>
						</a>
						<a href="/proveedores/{{ $provider->id }}" class="btn btn-warning btn-xs">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<form id="delete-form"  action="{{ action('ProvidersController@destroy', ['provider' => $provider ])}}" method="POST" style="display: inline;">
                        	{{ csrf_field() }}
                        	{{ method_field('DELETE') }}
                        	<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('script')
<script type="text/javascript" >

</script>
@endsection