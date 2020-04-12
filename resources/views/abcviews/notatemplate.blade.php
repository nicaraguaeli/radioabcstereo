@extends('layouts.home')
@section('contenido')
     
   <div class="d-flex mt-5" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">NOTICIAS</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">@if($tipo == 'local')
							  locales
							   @endif
							   @if($tipo == 'departamental')
							  departamentales
							   @endif
							   @if($tipo == 'nacional')
							  nacionales
							   @endif
							   @if($tipo == 'internacional')
							  internacionales
							   @endif


						</h4></div>
		
    </div>

   
        

	
	 <div class="row mt-3">
	 	<div class="col-lg-9">
	 		<div class="row">

					 			@foreach($global as $global_nota)
							<div class="col-md-6">
								@include('layouts.partial.nota')
							</div>
					           @endforeach
	 		</div>
	 	</div>
	 	<div class="col-lg-3  border-left">
	 		<div class="row">
	 			<div class="col-sm-12">
	 				 <div class=" wow fadeInUp " data-wow-delay="0.2s" >
		 <p class="text-center font-weight-bold text-white azul-fuerte " >LO MÁS VISTO</p>
         <div class="d-flex">
        <ul class="list-unstyled">
          @foreach($destacado as $de)
  <a class="link-destacado" href="{{url('nota',$de->ID.'_'.Str::slug($de->Titular,'-'))}}">
    <li class="media">
    <img width="64px;" class="mr-3" src="{{asset(''.$de->Imagen)}}" alt="Cargando..">
    <div class="media-body">
      <p class="mt-0 mb-1 format">{{$de->Titular}}</p>
     
    </div>
  </li>
  </a>
  
  @endforeach
 

  
</ul>
      </div>
	</div>
	 			</div>
	 			<div class="col-sm-12">
    @foreach($banner as $banner)
    @if($banner->posicion == 'aside' && $banner->link == "")
    <img class="img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
    @elseif($banner->posicion == 'aside' && $banner->link != "")
    <a href="{{$banner->link}}">
       <img class="img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">

    </a>
    @endif
    @endforeach
  </div>
	 		</div>
	 		
	 	</div>
	 	

	 </div>
    <div class="mt-2">
    	{{$global->links()}}
    </div>





@endsection
