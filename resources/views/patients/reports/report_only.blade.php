@extends('layout.reports.reports_main')
@section('titulo', 'Datos del paciente')
@section('contenido')
	<table class="table table-bordered">
      <tr>
        <td>
          {{$user->full_name}}
        </td>
        <td>
          {{$user->street_address}}
        </td>
      </tr>
      <tr>
        <td>
          {{$user->city}}
        </td>
        <td>
          {{$user->zip_code}}
        </td>
      </tr>
    </table>
@endsection