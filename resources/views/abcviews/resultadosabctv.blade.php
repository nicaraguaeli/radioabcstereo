@extends('layouts.home')
@section('contenido')

@if(sizeOf($videos)>0)

<h3 class="mt-5  mb-3">Videos de: {{$buscar}} </h3>
<div class="row ">
	<div class="col-lg-12">
		
		<ul  class="list-unstyled">
		@foreach($videos as $vid )
		<li>
            <a href="{{url('abctvsearch',$vid->id.'_'.Str::slug($vid->titulo,'-'))}}">
			<div class="d-flex mt-2 mb-2">
			<div class="text-center" style="background-image: url('{{asset(''.$vid->thumbnail)}}'); background-repeat: no-repeat; width: 300px; height: 150px; background-size: cover;" >
				<div class="mt-5"><i class="fas fa-play text-white" style="font-size: 40px;"></i></div>
			
			</div>
			<div class="ml-2">
			
			<h5 class="text-dark font-weight-bold">{{$vid->titulo}}</h5>
			<p class="text-muted ">{{$vid->descripcion}}</p>
			<p class="text-muted ">{{date('d-m-Y',strtotime($vid->created_at))}}</p>

		</div>
		</div></a>
	</li>
		@endforeach
	</ul>
  {{$videos->links()}}
</div>
@else
    <h3 class="mt-5 mb-3">No hay videos sobre: {{$buscar}} </h3>
@endif
	</div>
	



@endsection