<!-- LOCAL -->
<div class="container ">
  <section >

    <a href="{{url('locales')}}" class="">
      <div class="d-flex border-b my-4">
      
        <div class=" font-weight-bold  wow fadeInUp text-dark" data-wow-delay="0.2s" style="font-size: 1.1rem;">LOCALES</div>
      </div>
    </a>
    @php
    $flyer = $banner;
    @endphp
    <div class="row ">

      @foreach($local as $global_nota)
      @if(!$loop->first)
      <div class="col-lg-3">

        @include('layouts.partial.nota')

      </div>
      @endif
      @endforeach

      <div class="col-lg-3 wow fadeInUp border-left gris rounded ">

        <p class="text-center font-weight-bold text-white azul-claro rounded ">TE PUEDE INTERESAR</p>


        @foreach($destacado as $de)
        <a class="link-destacado" href="{{url('nota',$de->ID.'_'.Str::slug($de->Titular,'-'))}}">
          <div class="row ">

            <div class="col-3 col-sm-3 col-md-3 align-self-center overflow-hidden">
              <div>
                
                <img width="90px;" class="pl-1 pr-1" src="{{asset(''.$de->Imagen)}}" alt="Cargando.." title="{{$de->Titular}}">
              </div>
            </div>
            <div class="col-9 col-sm-9 col-md-9 align-self-center">
              
              <p class="mt-0 mb-1 format h6">{{$de->Titular}}</p>
            </div>


          </div>
        </a>
        <hr>
        @endforeach





      </div>

  </section>
  <!-- FIN LOCAL -->


  <!--DEPARTAMENTALES -->
  <section >
    <a href="{{url('departamentales')}}">
      <div class="d-flex border-b my-4">
       
        <h5 class="h5 font-weight-bold  wow fadeInUp text-dark" data-wow-delay="0.2s" style="font-size: 1.1rem;">DEPARTAMENTALES</h5>
      </div>
    </a>
    <div class="row ">

      @foreach($departamental as $global_nota)

      @if(sizeof($banner) > 1)

          @if(!$loop->first && !$loop->last)
          <div class="col-lg-3 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">

            @include('layouts.partial.nota')

          </div>

          @endif
      @elseif(!$loop->first)
      


      <div class="col-lg-3 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">

        @include('layouts.partial.nota')

      </div>
      @endif
  
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
  <section >
    <div class="row ">
      <div class="col-lg-6 border-right">
        <a href="{{url('nacionales')}}">
          <div class="d-flex border-b my-4">
           
            <h5 class="h5 font-weight-bold wow fadeInUp text-dark" data-wow-delay="0.2s" style="font-size: 1.1rem;">NACIONALES</h5>
          </div>
        </a>
        <div class="row">

          @foreach($nacional as $global_nota)
          <div class="col-lg-6 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">

            @include('layouts.partial.nota')

          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-6"><a href="{{url('internacionales')}}">
          <div class="d-flex border-b my-4">
           
            <h5 class="h5 font-weight-bold  wow fadeInUp text-dark" data-wow-delay="0.2s" style="font-size: 1.1rem;">INTERNACIONALES</h5>
          </div>
        </a>
        <div class="row ">

          @foreach($internacional as $global_nota)
          <div class="col-lg-6 wow bounceInLeft " data-wow-delay="0.{{$i+=1}}s">
            @include('layouts.partial.nota')

          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- FIN NACIONAL -->
  @foreach($flyer as $banner)
  @if($banner->posicion == 'header' && $banner->link == "")
  <div class="banner  text-center my-5" >
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>
  @elseif($banner->posicion == 'header' && $banner->link != "")
  <a target="_blank" href="{{$banner->link}}">
    <div class="banner  text-center my-5"  >
      <img class="m-auto img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
  </div>

  </a>
  @endif
  @endforeach
</div>