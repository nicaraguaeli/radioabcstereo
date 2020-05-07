@extends('layouts.home')
@section('etiquetas')
  <meta property="og:url"           content="http://www.radioabcstereo.com/abc/podcast/audio/{{$pod->id}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$pod->titulo}}" />
  <meta property="og:description"   content="{{$pod->entrada}}" />
  <meta property="og:image"         content="http://www.radioabcstereo.com/{{$pod->imagen}}" />


@endsection
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

<audio controls style="width: 100%;" controlsList="nodownload">
	<source src="{{asset($pod->url)}}">
</audio>

<p>{!!$pod->contenido!!}</p>

 <!--share-->
      <h4 class="mt-3"><span class="badge badge-primary">Compartir este audio<i class="fas fa-share-alt text-white ml-1"></i></span></h4>
     <div class="d-flex mb-2">
       <div class="mr-2"><div class="fb-share-button" 
    data-href="http://www.radioabcstereo.com/abc/podcast/audio/{{$pod->id}}"  
    data-layout="button_count">
  </div></div>
       <div class="mr-2">
         <a style="border-radius: 3px; background: #1da1f2;" target="_blank " href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button  text-white pl-2 pr-2" data-show-count="true">Tweet</a>
       </div>
       <div class="mr-2"><a style="border-radius: 3px;" class="badge-info text-white pl-2 pr-2 bg-dark" href="mailto:?subject=Noticia&amp;body=Noticia ABC http://www.radioabcstereo.com/abc/podcast/audio/{{$pod->id}}"
   title="Compartir por correo">
  <i class="fal fa-envelope mr-1" style="font-size: 12px;"></i><span>Email</span>
</a></div>
     </div>

  <!--FinShare-->

   <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
@endsection