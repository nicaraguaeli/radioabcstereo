@extends('layouts.home')
@section('contenido')
   <div class="row mt-5">
    	 
    <div class="col-lg-12">
    	
	<div class="d-flex" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">EMPLEOS</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">ABC</h4></div>
		
		
	
     </div>

    </div>	
        

	 </div>
@if(sizeOf($empleos)>0)
        <h3 class="mt-4">Oportunidades de Empleo</h3>
		<div class="row mt-5">

			@foreach($empleos as $empleo)
			<div class="col-sm-6">
				<div class="card border-secondary mb-3">
  <div class="card-header">{{$empleo->empleador}} | <span>{{$empleo->name}}</span> | Vence: {{$empleo->expiracion}}</div>
  <div class="card-body text-secondary">
     <h4 class="h4-responsive"><span class="badge badge-secondary">Cargo</span></h4><h5 class="card-title">{{$empleo->cargo}}</h5>
    <p class="card-text">{{$empleo->descripcion}}</p>
  </div>
</div>
			</div>
			
@endforeach
		</div>
		
	

@else
  <div class="container">
  	<div class="row">
		<div class="text-center col-sm-12 mt-5">
			<i class="fal fa-comment-smile" style="font-size: 48px;"></i>
			<h4>En este momento no hay empleos disponibles.</h4>
			<h5>
			¡Regresa pronto!</h5>
			<a class="btn btn-info" href="{{url('/')}}">ir a inicio</a>
		</div>
	</div>
  </div>
	

@endif
@endsection