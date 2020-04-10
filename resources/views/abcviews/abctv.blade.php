@extends('layouts.home')
@section('contenido')
 


@if(sizeOf($ultimos) > 0 && $destacado != null) 
        
       
        	
			<div class="row mt-1 border-bottom">
				<div class="col-lg-9">
					<div id="contenedor-youtube " class="embed-responsive embed-responsive-16by9" style="width: inherit; background-color: black;">
 				<iframe class="embed-responsive-item" onload="{{$destacado->id}}"  id="frame" style="width: inherit;" height="400" src="{{$destacado->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
 				
                 
 			</div>
 			<div id="descripcion " class="mt-2 descr" >
					    <h4 class="p-1">{{$abctv[0]->titulo}}</h4>
				<div class="d-flex p-1">
						<h6 class="mr-2"><i class="far fa-eye mr-1"></i>{{$destacado->visto}} vistas</h6>
						<h6  class="mr-2"><i class="far fa-clock mr-1"></i>Publicado el {{ date('d-M-Y', strtotime($destacado->created_at)) }}</h6>
						<h6  class="mr-2"><i class="far fa-user mr-1"></i>{{$destacado->autor}}</h6>
				</div>
			
				<h6 class="ml-1">{{$destacado->descripcion}}</h6>
				</div>
				</div>
				<div class="col-lg-3">
					<h4 class="text-center font-weight-bold">ÚLTIMOS VIDEOS</h4>
				
                  @foreach($ultimos as $ultimo)
				<div class="card border-0" style="max-width: 14rem;">
					<a onclick="{{$ultimo->id}} __ {{$ultimo->visto}} __ {{$ultimo->titulo}} __{{$ultimo->descripcion}} __ {{$ultimo->autor}} __ {{$ultimo->created_at}} __ {{$ultimo->url}}" class="link-youtube" href="">
					<div class="card-body text-center" style="background-image: url('{{asset(''.$ultimo->thumbnail)}}'); background-size: contain; height: 8rem; background-repeat: no-repeat;">
						
					  <i class="fas fa-play mt-4  " style="font-size: 1.5rem;"></i>
						
					</div>
					</a>
					<div class="card-text">
							<h6>{{$ultimo->titulo}}</h6>
						</div>
					

				</div>
             @endforeach
				</div>
			</div>
			<!-- Inicio Seccion -->
				
 				
 				@foreach($tipos as $tipo)
                
                 <div class="d-flex mt-5 mb-4  " >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">SECCIÓN</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">{{$tipo->tipo}}</h4></div>
		
		
	</div>

                 <div class="row border-bottom">
                 	@foreach($abctv as $video)
                 	@if($video->tipo == $tipo->tipo)
 					<div class="col-lg-3"><div class="card border-0 wow fadeInUp" data-wow-delay="0.{{$i+=1}}s" style="max-width: 14rem;">
					<a onclick="{{$video->id}} __ {{$video->visto}} __ {{$video->titulo}} __{{$video->descripcion}} __ {{$video->autor}} __ {{$video->created_at}} __ {{$video->url}}" class="link-youtube" href="">
					<div class="card-body text-center" style="background-image: url('{{asset(''.$video->thumbnail)}}'); background-size: contain; height: 8rem; background-repeat: no-repeat;">
						
					  <i class="fas fa-play mt-4  " style="font-size: 1.5rem;"></i>
						
					</div>
					</a>
					<div class="card-text">
							<h6>{{$video->titulo}}</h6>
						</div>
						
				</div>
			</div>
 					@endif
 					@endforeach
                 </div>
@endforeach
			<!-- FIn Seccion -->
			{{$abctv->links()}}

@else
<div class="container" style="min-height: calc(100vh - 400px);">
	
	<div class="row">
		<div class="col-sm-12 text-center mt-5">
			<i class="fal fa-comment-smile" style="font-size: 48px;"></i>
			<h4>Ups, Aun no hay videos en esta sección..</h4>
			<a class="btn btn-info" href="{{url('/')}}">ir a inicio</a>
		</div>
		
	</div>

</div>
@endif
     


<script>
	$(function() {
    function e(e) {
        $.ajax({
            url: "{{url('countview')}}",
            method: "get",
            data: {
                id: e
            }
        })
    }
    e($("#frame").attr("onload")), $(".link-youtube").click(function(a) {
        var c;
        a.preventDefault();
        const r = (c = (c = $(this).attr("onclick")).split("__"))[6].match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/);


        $("#contenedor-youtube").children().remove(), $("#contenedor-youtube").append('<iframe class="wow fadeInUp embed-responsive-item "  src="//www.youtube.com/embed/' + r[2] + '" frameborder="0" allowfullscreen></iframe>'), $(".descr").children().remove(), $(".descr").append('<div id="descripcion " class="mt-2 descr" ><h4 class="p-1">' + c[2] + '</h4><div class="d-flex p-1"><h6 class="mr-2"><i class="far fa-eye mr-1"></i>' + c[1] + ' vistas</h6> <h6  class="mr-2"><i class="far fa-clock mr-1"></i>Publicado el ' + c[5] + '</h6><h6  class="mr-2"><i class="far fa-user mr-1"></i>' + c[4] + '</h6></div><h6 class="ml-1">' + c[3] + "</h6></div>"), e(c[0]), $("HTML, BODY").animate({
            scrollTop: 0
        }, 1e3)
    })
});
	
</script>

@endsection