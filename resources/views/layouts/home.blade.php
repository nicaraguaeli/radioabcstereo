<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('etiquetas')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
    <title>{{$titulo}} | ABC Stereo</title>
    <meta name="author" content="Eli José Moncada" />
    

    <!-- TECNOLOGIA SEO ARCED -->
    @isset($descripcion)
    <meta name="description" content="{{  Str::limit($descripcion, 150, '...')      }}" />
    @else
     <meta name="keywords" content="radio abc stereo, radio abc estereo, radio abc, noticias abc, noticias esteli, noticias madriz, noticias nueva segovia, noticias nicaragua, escuchar radio abc, escuchar abc, radio abc estereo 99.7"/> 
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
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/jquery.marquee.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fuentebig.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css.css')}}" media="print">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

     
       
              
  <style>

    body
    {
      font-family: "Helvetica Neue", sans-serif !important;
      
    }
    .container
    {
      max-width: 1500px;
    }
    .color-red
    {
      color: #006097;
    }
    .border-b
{
     border-bottom: 3px solid #125fbc !important;
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
  
 
 
 
  @yield('contenido')
  
   
 
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
