<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>{{$titulo}} ABC | Stereo</title>
    <!-- TECNOLOGIA SEO ARCED -->
     @isset($descripcion)
    <meta name="description" content="{{$descripcion}}" />
    @else
     <meta name="description" content="Estelí, Nicaragua, Noticias Nicaragua, Noticias Estelí, Noticias Norte de Nicaragua, Noticias ABC, Abc Stereo, Abc sterio, Abc estereo, Abc esterio, Radio ABC, Radio ABC en vivo, Radio abc stereo 99.7 fm, escuchar abc stereo, abc estelí, radios nicaragua, radios esteli" />
    @endif<!-- TECNOLOGIA SEO ARCED META INDEXACIÓN -->         
    <meta name="robots" content="Estelí, Nicaragua, Noticias Nicaragua, Noticias Estelí, Noticias Norte de Nicaragua, Noticias ABC, Abc Stereo, Abc sterio, Abc estereo, Abc esterio, Radio ABC, Radio ABC en vivo, Radio abc stereo 99.7 fm, escuchar abc stereo, abc estelí, radios nicaragua, radios esteli" />
<!-- TECNOLOGIA SEO ARCED META INDEXACIÓN GOOGLE--> 
    <meta name="googlebot" content="Estelí, Nicaragua, Noticias Nicaragua, Noticias Estelí, Noticias Norte de Nicaragua, Noticias ABC, Abc Stereo, Abc sterio, Abc estereo, Abc esterio, Radio ABC, Radio ABC en vivo, Radio abc stereo 99.7 fm, escuchar abc stereo, abc estelí, radios nicaragua, radios esteli" />
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
 function clockUpdate(){var t=new Date;function c(t){return t<10?"0"+t:t}$(".digital-clock").css({color:"#fff","text-shadow":"0 0 6px #ff0"});var e,o=c((e=t.getHours())>12?e-12:0==e?12:e),n=c(t.getMinutes()),a=c(t.getSeconds());$(".digital-clock").text(o+":"+n+":"+a)}$(function(){clockUpdate(),setInterval(clockUpdate,1e3)});
   
   

      
    

  </script>
  
    <style>

      .wrapper
      {
        max-width: 1366px;
        margin: 0 auto;
      }
      body, html
      {
      font-family: Helmet,Freesans,Helvetica,Arial,sans-serif !important;
      

      }
    </style>
</head>
<body >
  <div id="spinner" class="justify-content-center d-flex" style="background-color: blue; width: 100%; height: 100vh; position: fixed; z-index: 3;">
    <div class="align-self-center">
          <img class="spinner-grow " style="width: 3rem; height: 3rem;" role="status" src="{{asset('img/brand.png')}}" alt="">
    </div>  
    
  </div>


  @include('layouts.partial.header')
   @isset($noticias)
  <div  class="franja bg-dark text-center">
 <marquee behavior="scroll" direction="left" style="max-width: 900px;" >
  
  @foreach($noticias as $nota)
    <span class="badge badge-success mr-2 text-uppercase">{{$nota->Ciudad}}</span><a class="text-white text-uppercase mr-3" href="{{url('nota',$nota->ID.'_'.Str::slug($nota->Titular,'-'))}}">{{$nota->Titular}}</a>
    @endforeach
   
   </marquee>
 </div>
@endif

 
 <main id="container-master" class="container-fluid " style="min-height:  calc(100vh - 400px)">

   @yield('contenido')
 </main>
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
