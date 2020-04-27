@extends('layouts.home')
@section('contenido')

@if(sizeOf($videos)>0)

<h3 class="mt-5  mb-3">Videos de: {{$buscar}} </h3>
<div class="row ">
	<div class="col-lg-12">
		
		<ul  class="list-unstyled">
		@foreach($videos as $vid)
		<li><a href="{{url('abctvsearch',$vid->id.'_'.Str::slug($vid->titulo,'-'))}}">
			
			<h5 class="text-dark font-weight-bold">{{$vid->titulo}}</h5>
			<p class="text-muted ">{{$vid->descripcion}}</p>
			<p class="text-muted ">{{date('d-m-Y',strtotime($vid->created_at))}}</p>

		</a></li>
		@endforeach
	</ul>
  {{$videos->links()}}
</div>
@else
    <h3 class="mt-5 mb-3">No hay videos sobre: {{$buscar}} </h3>
@endif
	</div>
	



@endsection