@extends('layouts.home')
@section('contenido')

@if(sizeOf($videos)>0)

<div class="container">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
<h3 class="mt-5  mb-3">Videos de: {{$buscar}} </h3>

		
		
		@foreach($videos as $vid )
		   
		   <a href="{{url('abctvsearch',$vid->id.'_'.Str::slug($vid->titulo,'-'))}}">
		   <div class="row mb-3">
		   	<div class="col-sm-3 text-center position-relative ">
				<img src="{{asset('').$vid->thumbnail}}" alt="{{$vid->titulo}}" class="img-fluid">   
			 
			   <div class="position-absolute" style="top: 35%; right: 46%;"><i class="fas fa-play  " style="font-size: 40px;"></i></div>
		   	</div>
		   	<div class="col-sm-9">
		   			<h5 class="text-dark font-weight-bold">{{$vid->titulo}}</h5>
		   				<p class="text-muted  ">{{$vid->descripcion}}</p>
			            <p class="text-muted ">{{date('d-m-Y',strtotime($vid->created_at))}}</p> 
		   		
		   	</div>
		   </div>
	      </a>
		@endforeach
	
  {{$videos->links()}}

@else
    <h3 class="mt-5 mb-3">No hay videos sobre: {{$buscar}} </h3>
@endif
	</div>
</div>

	



@endsection
