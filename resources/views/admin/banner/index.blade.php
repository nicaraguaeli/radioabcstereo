@extends('layouts.master')
@section('contenido')
@if(sizeOf($banner) > 0)

<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-12"><a class="btn btn-block btn-secondary" href="{{action('BannerController@create')}}">Agregar Banner</a></div>

</div>

</div>

</div>
<table class="table">
	<thead class="bg-dark">
		
		<th>Link</th>
		<th>Posicion</th>
		<th>Expiración</th>
		
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($banner as $banner)
		<tr>
			<td>{{$banner->link}}</td>
			<td>{{$banner->posicion}}</td>
			<td>@if($banner->expiracion > now())
				<span class="badge badge-success">Mostrandose</span>
				@else
				<span class="badge badge-info">Expirado</span>
				@endif
			</td>
			<td>
				
				<form method="post" action="{{route('banner.destroy',$banner->id)}}">
					@method('DELETE')
					@csrf
					<button class="btn btn-block bg-gradient-danger btn-sm"> <i class="fas fa-trash-alt" ></i></button>
				</form>
		     </td>
			
		</tr>
		@endforeach
	</tbody>
</table>
 
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-12"><a class="btn btn-block btn-secondary" href="{{route('banner.create')}}">Agregar Banner</a></div>

</div>

</div>

</div>
@endif

@endsection