<div class="container  mt-5 mt-md-3 ">
  <div class="d-flex border-b my-4">

    <div class=" font-weight-bold  wow fadeInUp text-dark mt-3" data-wow-delay="0.2s" style="font-size: 1.1rem;">NOTICIAS ABC</div>
  </div>


  <div class="row   mt-md-0">

    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-sm-0 p-0 p-md-1     mb-2  overflow-hidden">


      <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($local[0]->Titular,'-'))}}">
        <div class="position-relative">
          <div class="lds-dual-ring position-absolute {{$local[0]->ID}}"></div>
          <img src="{{asset('img/placeholder2.jpg')}}" name="{{$local[0]->ID}}" alt="{{$local[0]->Titular}}" class="w-100 rounded img-fluid" ref-src="{{asset(''.$local[0]->Imagen)}}">

          <div class="position-absolute  p-3  w-100 title-content rounded" style="bottom: 0;">
            <h3 class="font-size"><span class="badge azul-claro text-white">Local</span></h3>
            <div class="row  flex-nowrap  ">


              <div class="col-sm-6 text-white ml-2"><i class="fal fa-clock"></i><span class="h6 p-2">{{$local[0]->Dia}}-{{$local[0]->Mes}}-{{$local[0]->Ano}}</span></div>
              <div class="col-sm-6 text-white text-right"><i class="far fa-map-marker-alt"></i><span class="h6 p-2">{{$local[0]->Ciudad}}</span></div>
            </div>

          </div>
        </div>

        <h4 class="text-dark font-weight-bold p-2 ">{{$local[0]->Titular}}</h4 class="text-dark">
      </a>

    </div>






    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-sm-0 p-0 p-md-1     mb-2 position-relative overflow-hidden ">

      <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($departamental[0]->Titular,'-'))}}">
        <div class="position-relative">
          <div class="lds-dual-ring position-absolute {{$departamental[0]->ID}}"></div>
          <img src="{{asset('img/placeholder2.jpg')}}" name="{{$departamental[0]->ID}}" alt="{{$departamental[0]->Titular}}" class="w-100 rounded img-fluid" ref-src="{{asset(''.$departamental[0]->Imagen)}}">

          <div class="position-absolute  p-3  w-100 title-content rounded" style="bottom: 0;">
            <h3 class="font-size"><span class="badge azul-claro text-white">Departamental</span></h3>
            <div class="row  flex-nowrap  ">


              <div class="col-sm-6 text-white ml-2"><i class="fal fa-clock"></i><span class="h6 p-2">{{$local[0]->Dia}}-{{$local[0]->Mes}}-{{$local[0]->Ano}}</span></div>
              <div class="col-sm-6 text-white text-right"><i class="far fa-map-marker-alt"></i><span class="h6 p-2">{{$local[0]->Ciudad}}</span></div>
            </div>

          </div>
        </div>
        <h4 class="text-dark font-weight-bold p-2 ">{{$departamental[0]->Titular}}</h4 class="text-dark">
      </a>


    </div>




  </div>
  <hr>
</div>