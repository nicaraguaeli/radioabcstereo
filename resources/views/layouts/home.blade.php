<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('etiquetas')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
    <title>{{$titulo}} ABC | Stereo</title>
    <meta name="author" content="Eli José Moncada" />
    <meta name="keywords" content="radio abc stereo, radio abc estereo, radio abc, noticias abc, noticias esteli, noticias madriz, noticias nueva segovia, noticias nicaragua, escuchar radio abc, escuchar abc, radio abc estereo 99.7"/>

    <!-- TECNOLOGIA SEO ARCED -->
    @isset($descripcion)
    <meta name="description" content="{{$descripcion}}" />
    @else
     <meta name="description" content="Radio ABC Stereo, transmitiendo desde Estelí, Nicaragua. Escúchenos en línea e infórmese con las noticias más importantes." />
    @endif<!-- TECNOLOGIA SEO ARCED META INDEXACIÓN -->         
    <meta name="robots" content="Radio ABC Stereo, transmitiendo desde Estelí, Nicaragua. Escúchenos en línea e infórmese con las noticias más importantes." />
<!-- TECNOLOGIA SEO ARCED META INDEXACIÓN GOOGLE--> 
    <meta name="googlebot" content="Radio ABC Stereo, transmitiendo desde Estelí, Nicaragua. Escúchenos en línea e infórmese con las noticias más importantes." />
<!-- TECNOLOGIA SEO ARCED MY BOX DE GOOGLE--> 
    <meta name="google" content="nositelinkssearchbox" />
<!-- TECNOLOGIA SEO ARCED PROPIETARIOS--> 
    <meta name="google-site-verification" content="Radio ABC Stereo Estelí" />
    

    <link rel="icon" type="icon"   href="{{asset('favicon.ico')}}">

    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "Organization",
    "name": "Radio ABC Stereo Estelí"
  },
  "author": {
    "@type": "Person",
    "name": "Radio ABC"
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "7",
    "bestRating": "10"
  },
  "publisher": {
    "@type": "Organization",
    "name": "RADIO ABC"
  }
}
</script>     



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/fuentebig.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css.css')}}" media="print">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

     
         <script src="{{asset('js/wow.min.js')}}"></script>
           
         
              <script>
                 new WOW().init();
                 
              </script>
              <script>
 function clockUpdate(){var t=new Date;function c(t){return t<10?"0"+t:t}$(".digital-clock").css({color:"black"});var e,o=c((e=t.getHours())>12?e-12:0==e?12:e),n=c(t.getMinutes()),a=c(t.getSeconds());$(".digital-clock").text(o+":"+n+":"+a)}$(function(){clockUpdate(),setInterval(clockUpdate,1e3)});
  $(function() {
    $('marquee').mouseover(function() {
        $(this).attr('scrollamount',0);
    }).mouseout(function() {
         $(this).attr('scrollamount',5);
    });
});
   
   

      
    

  </script>
  <style>

    body
    {
      font-family: "Nunito", sans-serif !important;
    }
    

  </style>
   
</head>
<body >
  <div id="spinner" class="justify-content-center d-flex flex-column" style="background-color: #e8e8e8; width: 100%; height: 100vh; position: fixed; z-index: 3;">
    <div class="align-self-center">
       <img  style="width: 5rem; height: 5rem;" role="status" src="{{asset('img/brand.png')}}" alt="">
    </div>
    <div class="align-self-center ">

       
        <span  class="spinner-border "></span>
          
    </div>  
    
  </div>


  @include('layouts.partial.header')
  @isset($noticias)
  <div  class="franja bg-dark text-center">
 <marquee behavior="scroll" direction="left" style="max-width: 900px; font-size: 0.7rem;" >
  
  @foreach($noticias as $nota)
    <span class="badge badge-danger mr-2 text-uppercase">{{$nota->Ciudad}}</span><a class="text-white text-uppercase mr-3" href="{{url('nota',$nota->ID.'_'.Str::slug($nota->Titular,'-'))}}">{{$nota->Titular}}</a>
    @endforeach
   
   </marquee>
 </div>  
  @endif
 
 
 <div class="container-fluid" style="min-height: calc(100vh - 400px)">
  <div class="container p-0">
    @yield('contenido')
  </div> 
 </div>
   
 
 @include('layouts.partial.footer')
  
 <div id="topScroll" style=" position: fixed; bottom: 3rem;right: 3rem;"><i class="fas fa-arrow-circle-up text-primary" style="font-size: 48px;"></i></div>
 <script>
   $(function(){
    $('#topScroll').click(function(){
         $("HTML, BODY").animate({
            scrollTop: 0
        }, 1000);
    });
   });
 </script> 
 
</body>
</html>
