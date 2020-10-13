@extends('layouts.home')
@section('contenido')
<div class="container">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
	<h3 class="mt-5">Hemos encontrado <span class="badge badge-info">{{$notas->total()}}</span> resultados sobre: {{$busqueda}} </h3>
	<div class="row mt-5">
		@foreach($notas as $global_nota)
		<div class="col-lg-3 wow bounceInLeft " >
			@include('layouts.partial.nota')
		</div>
		@endforeach
	</div>
	{{$notas->links()}}
</div>


@endsection