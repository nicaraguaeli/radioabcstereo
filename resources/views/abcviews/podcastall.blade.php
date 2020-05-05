@extends('layouts.home')
@section('contenido')

@if(sizeOf($transmisiones)>0)

<h3 class="mt-5 mb-3">Todas las transmisiones</h3>
<div class="row">
	<div class="col-lg-12">
		
		<ul  class="list-unstyled">
		@foreach($transmisiones as $tra)
		<li>
			
			<h5 class="text-dark font-weight-bold">{{$tra->titulo}}</h5>
			<a class="text-muted" href="{{$tra->url}}" target="_blank">{{$tra->url}}</a>
		

		</li>
		@endforeach
	</ul>
  {{$transmisiones->links()}}
</div>
@else
    <h3 class="mt-5 mb-3">No hay resultados</h3>
@endif
	</div>
	



@endsection