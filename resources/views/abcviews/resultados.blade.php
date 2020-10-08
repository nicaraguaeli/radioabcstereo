@extends('layouts.home')
@section('contenido')
<div class="container">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
	<h3 class="mt-5">Hemos encontrado <span class="badge badge-info">{{$count}}</span> resultados sobre: {{$buscar}} </h3>
	<div class="row mt-5">
		@foreach($notas as $global_nota)
		<div class="col-lg-3 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">
			@include('layouts.partial.nota')
		</div>
		@endforeach
	</div>
	{{$notas->links()}}
</div>


@endsection