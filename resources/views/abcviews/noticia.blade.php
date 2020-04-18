@extends('layouts.home')
@section('etiquetas')
  <meta property="og:url"           content="http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$nota->Titular}}" />
  <meta property="og:description"   content="{{$nota->entrada}}" />
  <meta property="og:image"         content="http://www.radioabcstereo.com/{{$nota->Imagen}}" />


@endsection
@section('contenido')




	

  @foreach($banner as $banner)
  @if($banner->posicion == 'header' && $banner->link == "")
  <div class="banner mt-2 text-center" style="height: 100px; overflow: hidden; ">
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>
  @elseif($banner->posicion == 'header' && $banner->link != "")
  <a target="_blank" href="{{$banner->link}}">
    <div class="banner mt-2 text-center" style="height: 100px; overflow: hidden; ">
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>

  </a>
  @endif
  @endforeach

		 <div class="d-flex mt-5 " >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">NOTICIA</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">{{$nota->Area}}</h4></div>
		
		
	</div>

    <div class="bg-white pl-2">
      
       <h1 class="h1-responsive mt-3 font-weight-bold ">{{$nota->Titular}}</h1>
     <div class="d-flex info-nota">
      <div class="mr-3"><i class="fad fa-id-card " ></i><span class="h6 p-2"><span class="badge badge-secondary mr-2">@foreach($periodistas as $perio)
                                  @if($perio->nombre == $nota->Autor)
                                  {{$perio->tipo}}
                                  @endif
                                  @endforeach
  </span>{{$nota->Autor}}</span></div>
      <div class="mr-3"><i class="fal fa-clock " ></i><span class="h6 p-2 ">{{$fecha}}</span></div>
      <div class="mr-3"><i class="far fa-map-marker-alt" ></i><span class="h6 p-2 ">{{$nota->Ciudad}}</span></div>
      <div class="mr-3"><button class="btn btn-default p-0" type="button" onclick="javascript:window.print()"><i class="fal fa-print mr-1" ></i><span class="h6  ">Imprimir</span></button></div>
      
     </div>
  
  
     <section >
      
      <div class="row mt-2 ">
        <div class="col-lg-9 align-self-center">
          <h5 class="p-2 font-weight-bold text-dark">{{$nota->entrada}}</h5>
          <img class="img-fluid" src="{{asset(''.$nota->Imagen)}}" alt="{{$nota->Titular}}"></div>
        



        <div class="col-lg-3 border-left p-0" id="seccion-nota">
          @include('layouts.partial.lomasvisto')
        </div>
      </div>
     
 <div class="row mt-3">
  <div class="col-lg-9">
    
    <div id="contenido-nota" >{!! $nota->Contenido !!}{!! $nota->Contenido2 !!}</div>
  </div>
  <div class="col-lg-3 wow fadeInUp border-left lomas ">
        <div class="row">
        <div class="col-sm-12">
            <p class="text-center font-weight-bold azul-fuerte text-white" >LO MÁS DESTACADO DEL MES</p>
          <div class="d-flex">
        <ul class="list-unstyled">
          @foreach($destacado as $de)
  <a href="{{url('nota',$de->ID.'_'.Str::slug($de->Titular,'-'))}}" class="link-destacado">
    <li class="media">
    <img width="64px;" class="mr-3" src="{{asset(''.$de->Imagen)}}" alt="Cargando..">
    <div class="media-body">
      <h6 class="mt-0 mb-1  ">{{$de->Titular}}</h6>
     
    </div>
  </li>
  </a>
  
  @endforeach


  
</ul>
      </div>
        </div>  
        <div class="col-sm-12 mt-2">
             
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0"></script>
<div class="fb-page" data-href="https://www.facebook.com/radioabcesteli" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/radioabcesteli" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/radioabcesteli">Radio ABC Stereo</a></blockquote></div> 
        </div>
        </div>
      
    
        
    </div>

 </div>


     </section>
     
     

    </div>
      

      <h4 class="mt-3"><span class="badge badge-primary">Comparte esta noticia<i class="fas fa-share-alt text-white ml-1"></i></span></h4>
     <div class="d-flex">
       <div class="mr-2"><div class="fb-share-button" 
    data-href="http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}"  
    data-layout="button_count">
  </div></div>
       <div class="mr-2">
         <a style="border-radius: 3px; background: #1da1f2;" target="_blank " href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button  text-white pl-2 pr-2" data-show-count="true">Tweet</a>
       </div>
       <div class="mr-2"><a style="border-radius: 3px;" class="badge-info text-white pl-2 pr-2 bg-dark" href="mailto:?subject=Noticia&amp;body=Noticia ABC http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}"
   title="Compartir por correo">
  <i class="fal fa-envelope mr-1" style="font-size: 12px;"></i><span>Email</span>
</a></div>
     </div>
     <!--ENCUESTA -->
     <section id="encuesta" class="container mt-5 wow fadeInUp" >
     	 
     	  <h3>¿ Te fue de interés esta noticia ?</h3>
     	  <h5>Regálanos un minuto por favor.</h5>
     	  <div class="card">
     	  	<form class="form" >
     	  	

<h5 class="text-center">Danos tu calificación:</h5>
<div class="custom-control custom-radio form-group border-bottom ">
  <input type="radio" checked="" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" value="{{$nota->ID}}-Definitivamente" >
  <label class="custom-control-label" for="defaultGroupExample1">Si, definitivamente</label>
</div>

<!-- Group of default radios - option 2 -->
<div class="custom-control custom-radio form-group border-bottom">
  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios"  value="{{$nota->ID}}-Interesante">
  <label class="custom-control-label" for="defaultGroupExample2">No, es poco interesante</label>
</div>

<!-- Group of default radios - option 3 -->
<div class="custom-control custom-radio form-group border-bottom">
  <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios" value="{{$nota->ID}}-Indiferente">
  <label class="custom-control-label" for="defaultGroupExample3">Me es indiferente</label>
</div>
<button type="button" id="btn-encuesta" class="btn btn-primary text-white" >Calificar</button>

     	  	</form>
     	  </div>
     </section>
      <!--FIN ENCUESTA -->




<!-- Modal -->
<div class="modal fade" id="modalencuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle">Muchas Gracias!!</h5>
       
      </div>
      <div class="modal-body">
      	<div class="text-center">
      		<i class="fal fa-smile-beam" style="font-size: 48px; color: #dbdbdb;"></i>
      	</div>
       <h5 class="text-center">Tu calificación es de mucha importancia para nosotros. </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir aca</button>
        <a href="{{url('/')}}" class="btn btn-secondary" >Ir al inicio</a>
      
      </div>
    </div>
  </div>
</div>
 

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


<script>
  $(function(){$("#btn-encuesta").click(function(a){a.preventDefault(),id=$("input[name='groupOfDefaultRadios']:checked").val(),$.ajax({url:"{{url('calificacion')}}",type:"get",data:{id:id},success:function(a){$("#modalencuesta").modal("show"),$("#encuesta").css("display","none")}})})
   $('iframe').addClass('embed-responsive-item').wrap( "<div class='embed-responsive embed-responsive-16by9'></div>" );
   $('#contenido-nota').addClass('format').children('p').addClass('format');
    
});

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86035316-1', 'auto');
  ga('send', 'pageview');

</script>

@endsection