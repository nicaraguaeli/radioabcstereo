@extends('layouts.home')
@section('contenido')
 
    <div class="d-flex mt-5" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">ABC</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">tv</h4></div>
		
		
	
     </div>
    
     @if(sizeOf($tipos) > 0)
 
 @foreach($tipos as $tipo)
 
 <div class="d-flex mt-5 mb-4  " >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">SECCIÓN</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s"><a class="text-dark" href="{{url('abctvlist',$tipo->tipo)}}">{{$tipo->tipo}}</a></h4></div>
		
		
	</div>


 			
 <div class="row border-bottom">
 	 @foreach($videos as $video)
 	

		@if($tipo->tipo == $video->tipo)
	
 	 <div class="col-lg-3 wow fadeIn " data-wow-delay="0.{{$i++}}s" >
 	 	

   <a href="{{url('abctvsearch',$video->id.'_'.Str::slug($video->titulo,'-'))}}">
            <div class="card border-0  "  >
  <img src="{{$video->thumbnail}}" class="card-img-top rounded" alt="">
   <i class="fas fa-play mt-1  " style="font-size: 1.5rem; margin: 0 auto;"></i>
						
  <div class="card-body text-white" >
   <div class="row justify-content-around">
       <div class="col-xs-6"><h5 class="h-5 text-dark auto-height font-weight-bold">{{$video->titulo}}</h5></div>
       <div class="col-xs-6 ">
           <h6 class="text-dark">{{$video->fecha}}</h6>
 
 </div>
    </div>
    

  </div>
</div>
        </a>

 	 </div>
 	 
 	 		@endif
 	 @endforeach
 	 
 </div>
 				
 @endforeach

 @endif

@endsection