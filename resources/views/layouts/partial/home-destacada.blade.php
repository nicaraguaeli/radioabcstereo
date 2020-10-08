<div class="container  mt-5 mt-md-0 ">
  <div class="row p-3 m-md-4">
    <div class="col-md-4 col-lg-4 align-self-center" style="opacity: 0.5;">
<div>
  <div class="border-b"></div>
  <div class="border-b mt-1"></div>
</div>
    </div>
    <div class="col-md-4 col-lg-4">
    <div class=" h1 py-2 text-center m-0 " style=" color: #005c92; font-family: 'Montserrat', sans-serif; ">EN PORTADA</div>
    </div>
    <div class="col-md-4 col-lg-4 align-self-center" style="opacity: 0.5;">
    <div>
  <div class="border-b"></div>
  <div class="border-b mt-1"></div>
</div>
    </div>
  </div>
 
  <div class="row ">

    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-sm-0 p-0 p-md-1     mb-2 position-relative overflow-hidden">


      <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($local[0]->Titular,'-'))}}">

        <img src="{{asset(''.$local[0]->Imagen)}}" alt="" class="img-fluid rounded">

        <div class="position-absolute  p-3 title-content w-100" style="bottom: 0;">
          <h3 class="font-size"><span class="badge azul-claro text-white">Local</span></h3>
          <div class="p-1 text-white h4 font-size">{{$local[0]->Titular}}</div>
          <div class="row  flex-nowrap d-sm-none d-md-flex d-none">

            <div class="col-sm-6 text-white ml-2"><i class="fal fa-clock"></i><span class="h6 p-2">{{$local[0]->Dia}}-{{$local[0]->Mes}}-{{$local[0]->Ano}}</span></div>
            <div class="col-sm-6 text-white text-right"><i class="far fa-map-marker-alt"></i><span class="h6 p-2">{{$local[0]->Ciudad}}</span></div>
          </div>
        </div>
      </a>

    </div>






    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-sm-0 p-0 p-md-1     mb-2 position-relative overflow-hidden">


      <a href="{{url('nota',$departamental[0]->ID.'_'.Str::slug($departamental[0]->Titular,'-'))}}">
        <img src="{{asset(''.$departamental[0]->Imagen)}}" alt="" class="img-fluid rounded">

        <div class="position-absolute  p-3 title-content w-100" style="bottom: 0;">
          <h3 class="font-size"><span class="badge azul-claro text-white">Departamental</span></h3>
          <div class="p-1 text-white h4 font-size">{{$departamental[0]->Titular}}</div>

          <div class="row  flex-nowrap d-sm-none d-md-flex d-none">

            <div class="col-sm-6 col-md-6 text-white ml-2 "><i class="fal fa-clock"></i><span class="h6 p-2">{{$departamental[0]->Dia}}-{{$departamental[0]->Mes}}-{{$departamental[0]->Ano}}</span></div>
            <div class="col-sm-6 col-md-6 text-white text-right "><i class="far fa-map-marker-alt"></i><span class="h6 p-2">{{$departamental[0]->Ciudad}}</span></div>
          </div>
        </div>
      </a>

    </div>




  </div>

</div>
</div>