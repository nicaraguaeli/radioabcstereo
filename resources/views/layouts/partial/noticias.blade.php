<!-- LOCAL -->
<section class="mt-5" >
  
  <a href="{{url('locales')}}" >
  <div class="d-flex border-bottom" >
    <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
    <h5 class="h5 font-weight-bold ml-2 wow fadeInUp text-dark" data-wow-delay="0.2s">LOCALES</h5>
  </div>
    </a>
    <div class="row mt-5">
       
      @foreach($local as $global)
      <div class="col-lg-3 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">

        @include('layouts.partial.nota')

      </div>
      @endforeach

      <div class="col-lg-3 wow fadeInUp border-left ">
        
        <p class="text-center font-weight-bold text-white azul-fuerte " >LO MÁS DESTACADO DEL MES</p>
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
  
</section>
<!-- FIN LOCAL -->


<!--DEPARTAMENTALES -->
<section  style="padding-top: 20px;">
  <a href="{{url('departamentales')}}">
  <div class="d-flex border-bottom" >
    <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
    <h5 class="h5 font-weight-bold ml-2 wow fadeInUp text-dark" data-wow-delay="0.2s">DEPARTAMENTALES</h5>
  </div>
    </a>
    <div class="row mt-5">

            @foreach($departamental as $global)

      <div class="col-lg-3 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">

       @include('layouts.partial.nota')
      
     </div>
   @endforeach  
  
  <div class="col-lg-3">
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
  
</section>

<!--FIN DEPARTAMENTALES -->

<!-- NACIONAL E INTERNACIONAL -->
<section   >
  <div class="row mt-5">
    <div class="col-lg-6 border-right">
      <a href="{{url('nacionales')}}">
      <div class="d-flex border-bottom" >
    <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
    <h5 class="h5 font-weight-bold ml-2 wow fadeInUp text-dark" data-wow-delay="0.2s">NACIONALES</h5>
    </div>
    </a>
    <div class="row mt-5" >
       
      @foreach($nacional as $global)
      <div class="col-lg-6 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">
       
       @include('layouts.partial.nota')
      
  </div>
   @endforeach  
    </div>
</div>
    <div class="col-lg-6"><a href="{{url('internacionales')}}"><div class="d-flex border-bottom" >
    <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
    <h5 class="h5 font-weight-bold ml-2 wow fadeInUp text-dark" data-wow-delay="0.2s">INTERNACIONALES</h5>
    </div>
    </a>
    <div class="row mt-5">
      
      @foreach($internacional as $global)
      <div class="col-lg-6 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">
        @include('layouts.partial.nota')
      
  </div>
   @endforeach  
    </div>
</div>
  </div>
</section>
<!-- FIN NACIONAL -->