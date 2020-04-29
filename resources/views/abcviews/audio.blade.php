@extends('layouts.home')
@section('contenido')



<div class="mt-3">
     	   <a  href="{{url('abc/podcast')}}"><i class="fas fa-arrow-circle-left" style="font-size: 18px;"></i><span class="ml-1">Volver a la sección anterior</span></a>
     </div>

<div class="row mt-5">
     
	<div class="col-xs-6 ml-2">
		<img class="rounded" src="{{asset(''.$pod->imagen)}}" alt="{{$pod->titulo}}">
	</div>
	<div class="col-xs-6">
		<div class="row">
			<div class="col-sm-12 ml-2">
				<h5 class="font-weight-bold">{{$pod->titulo}}</h5>
				<p>{{$pod->entrada}}</p>
			</div>
			
		</div>
	</div>
</div>

<audio controls style="width: 100%;">
	<source src="{{asset($pod->url)}}">
</audio>

<p>{!!$pod->contenido!!}</p>
@endsection