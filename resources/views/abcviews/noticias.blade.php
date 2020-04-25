@extends('layouts.home')
@section('contenido')

@if(sizeOf($notas)>0)

<h3 class="mt-5 mb-3">Noticias de: {{$buscar}} </h3>
<div class="row">
	<div class="col-lg-12">
		
		<ul  class="list-unstyled">
		@foreach($notas as $nota)
		<li><a href="{{url('nota',$nota->ID.'_'.Str::slug($nota->Titular,'-'))}}">
			
			<h5 class="text-dark font-weight-bold">{{$nota->Titular}}</h5>
			<p class="text-muted ">{{$nota->entrada}}</p>
			<p class="text-muted ">{{$nota->Dia}}-{{$nota->Mes}}-{{$nota->Ano}}</p>

		</a></li>
		@endforeach
	</ul>
  {{$notas->links()}}
</div>
@else
    <h3 class="mt-5 mb-3">No hay resultados del autor: {{$buscar}} </h3>
@endif
	</div>
	



@endsection