 <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="{{asset('swiper/swiper.min.css')}}">

  <!-- Demo styles -->
  <style>
    
    .swiper-container {
      max-width:  auto;
      height:auto;

    }
    .swiper-slide {
      
      font-size: 18px;
      background: #fff;

     
    }
  </style>

 
  @foreach($banner as $banner)
  @if($banner->posicion == 'header' && $banner->link == "")
  <div class="banner mb-2 text-center mt-5" style="height: 100px; overflow: hidden; ">
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>
  @elseif($banner->posicion == 'header' && $banner->link != "")
  <a target="_blank" href="{{$banner->link}}">
    <div class="banner mb-2 text-center mt-5" style="height: 100px; overflow: hidden; ">
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>

  </a>
  @endif
  @endforeach
	<div class="row" style="background-color: #e8e8e8; ">

		<div class=" col-lg-9  ">
			 <div class="swiper-container wow fadeIn">
    <div class="swiper-wrapper">
       @foreach($noticias as $nota)
     
          <div class="swiper-slide" ><a href="{{url('nota',$nota->ID.'_'.Str::slug($nota->Titular,'-'))}}" class="text-dark"><img  class="img-fluid" src="{{asset(''.$nota->Imagen)}}" alt="">
       <div >
    <span class="h1 titular ml-1 font-weight-bold" >{{$nota->Titular}}</span></a>
    <div class="row">
      <div class="col sm-6 text-gray"><i class="fad fa-id-card ml-1" ></i><span class="h6 p-2">{{$nota->Autor}}</span></div>
      <div class="col sm-6 text-gray"><i class="fal fa-clock" ></i><span class="h6 p-2">{{$nota->Dia}}-{{$nota->Mes}}-{{$nota->Ano}}</span></div>
    </div>

      
     
  </div>

</div>
@endforeach

     
      
    </div>
    <!-- Add Pagination -->
    <!--<div class="swiper-pagination"></div> -->
   
  </div>
		</div>
		<div class="col-lg-3" style="padding: 0;">
			
			
     @include('layouts.partial.lomasvisto')
 
		

		</div>
	
</div>
 

 <!-- Swiper JS -->
  <script src="{{('swiper/swiper.min.js')}}"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: false,
      autoplay: {
        delay: 5000,
        disableOnInteraction: true,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
   