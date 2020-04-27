@extends('layouts.home')
@section('etiquetas')
  <meta property="og:url"           content="http://www.radioabcstereo.com/abctvsearch/{{$video->id}}_{{Str::slug($video->titulo,'-')}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$video->titulo}}" />
  <meta property="og:description"   content="{{$video->descripcion}}" />
  <meta property="og:image"         content="http://www.radioabcstereo.com/{{$video->thumbnail}}" />


@endsection
@section('contenido')

   <div class="d-flex mt-5" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">ABC</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">tv</h4></div>
		<i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2  text-uppercase" >{{$video->tipo}}</h4></div>
		
		
	
     </div>
     <div class="mt-3">
     	   <a  href="{{url('abctv')}}"><i class="fas fa-arrow-circle-left" style="font-size: 18px;"></i><span class="ml-1">Volver a la seccion anterior</span></a>
     </div>
  
 
<div class="row mt-2 border-bottom">
				<div class="col-lg-9">
					<div  class="embed-responsive embed-responsive-16by9 youtube-video" style="width: inherit; background-color: black;">
						
					<iframe class="embed-responsive-item" onload="{{$video->id}}"  id="frame" style="width: inherit;" height="400" src="{{$video->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
						
 				
 				
                 
 			</div>
 			<div id="descripcion " class="mt-2 descr" >
					    <h4 class="p-1 ">{{$video->titulo}}</h4>
				<div class="d-flex p-1 justify-content-between">
						<h6 class="mr-2"><i class="far fa-eye mr-1"></i>{{$video->visto}} vistas</h6>
						<h6  class="mr-2"><i class="far fa-clock mr-1"></i>{{ $video->fecha }}</h6>
						<h6  class="mr-2"><i class="far fa-user mr-1"></i>{{$video->autor}}</h6>
				</div>
			
				<h6 class="ml-1">{{$video->descripcion}}</h6>
				</div>
				</div>

				<div class="col-lg-3">
					<h5 class="text-center font-weight-bold">ÚLTIMOS VIDEOS</h5>
				
                  @foreach($ultimos as $ultimo)
				<div class="card border-0" style="max-width: 14rem;">
					<a   href="{{url('abctvsearch',$ultimo->id.'_'.Str::slug($ultimo->titulo,'-'))}}">
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
			<h4 class="mt-3"><span class="badge badge-primary">Comparte esta noticia<i class="fas fa-share-alt text-white ml-1"></i></span></h4>
     <div class="d-flex">
       <div class="mr-2"><div class="fb-share-button" 
    data-href="http://www.radioabcstereo.com/abctvsearch/{{$video->id}}_{{Str::slug($video->titulo,'-')}}"  
    data-layout="button_count">
  </div></div>
       <div class="mr-2">
         <a style="border-radius: 3px; background: #1da1f2;" target="_blank " href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button  text-white pl-2 pr-2" data-show-count="true">Tweet</a>
       </div>
       <div class="mr-2"><a style="border-radius: 3px;" class="badge-info text-white pl-2 pr-2 bg-dark" href="mailto:?subject=Noticia&amp;body=Noticia ABC http://www.radioabcstereo.com/abctvsearch/{{$video->id}}_{{Str::slug($video->titulo,'-')}}"
   title="Compartir por correo">
  <i class="fal fa-envelope mr-1" style="font-size: 12px;"></i><span>Email</span>
</a></div>
     </div>

			<div class="mt-5 ">
				<h4>También te pueden interesar videos sobre:  @foreach($tipos as $tipo)
					<a href="{{url('abctvlist',$tipo->tipo)}}"><span class="badge badge-info">{{$tipo->tipo}}</span></a>
					@endforeach
				</h4>
			</div>
   
   <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>



               
			<script>
	 $(function() {
    
    function count(e) {
        $.ajax({
            url: "{{url('countview')}}",
            method: "get",
            data: {
                id: e
            }
        })
    }

    id = $("#frame").attr("onload");
    count(id);

});
	
</script>
@endsection
