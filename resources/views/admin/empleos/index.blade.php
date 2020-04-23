@extends('layouts.master')
@section('contenido')
@if(sizeOf($empleos) > 0)

<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-12"><a class="btn btn-block btn-secondary" href="{{route('empleo.create')}}">Agregar empleo</a></div>

</div>

</div>

</div>
<table class="table">
	<thead class="bg-dark">
		
		<th>Cargo</th>
		<th>Empleador</th>
		<th>Descripción</th>
		<th>Publicación</th>
		<th>Expiración</th>
		<th>Estado</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($empleos as $empleo)
		<tr>
			<td>{{$empleo->cargo}}</td>
			<td>{{$empleo->empleador}}</td>
			<td>{!!$empleo->descripcion!!}</td>
			<td>{{$empleo->created_at}}</td>
			<td>{{$empleo->expiracion}}</td>
			<td>@if($empleo->expiracion > now())
				<span class="badge badge-success">Disponible</span>
				@else
				<span class="badge badge-info">Expirado</span>
				@endif
			</td>
			<td>
				<a class="btn btn-block bg-gradient-warning btn-sm" href="{{route('empleo.edit',$empleo->id)}}"><i class="fas fa-edit"></i></a>
				<form method="post" action="{{route('empleo.destroy',$empleo->id)}}">
					@method('DELETE')
					@csrf
					<button class="btn btn-block bg-gradient-danger btn-sm"> <i class="fas fa-trash-alt" ></i></button>
				</form>
		     </td>
			
		</tr>
		@endforeach
	</tbody>
</table>
 {{$empleos->links()}}
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-12"><a class="btn btn-block btn-secondary" href="{{route('empleo.create')}}">Agregar empleo</a></div>

</div>

</div>

</div>
@endif

@endsection