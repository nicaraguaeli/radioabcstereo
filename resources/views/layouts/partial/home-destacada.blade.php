<div class="container  mt-5 mt-md-3 ">
 
 
  <div class="row   mt-md-0">

    <div class="col-12 col-sm-12 col-md-8 col-lg-8 p-sm-0 p-0 p-md-1     mb-2 position-relative overflow-hidden">


      <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($local[0]->Titular,'-'))}}">

        <img src="{{asset('img/placeholder2.jpg')}}" alt="{{$local[0]->Titular}}" class="w-100 rounded" ref-src="{{asset(''.$local[0]->Imagen)}}">

        <div class="position-absolute  p-3  w-100" style="top: 0;">
          <h2 class="" ><span class="badge azul-claro text-white">Local</span></h2>
         
         
        </div>
      </a>

    </div>






    <div class="col-12 col-sm-12 col-md-4 col-lg-4 p-sm-0 p-0 p-md-1     mb-2 position-relative overflow-hidden ">
    <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($local[0]->Titular,'-'))}}" class="text-dark">
      <h1 class="p-2  h1 font-size font-weight-bold mt-md-0">{{$local[0]->Titular}}</h1>
    </a>
    
    
    <div class="position-md-absolute w-100" style="bottom: 0;">
    <a href="{{url('nota',$local[0]->ID.'_'.Str::slug($local[0]->Titular,'-'))}}" class="text-dark">
    <h5 class="p-2 text-dark h5 font-size text-muted ">{{$local[0]->entrada}}</h5>
    </a>
    <div class="row  flex-nowrap d-sm-none d-md-flex d-none " >
   
 
   <div class="col-sm-6 text-dark ml-2"><i class="fal fa-clock"></i><span class="h6 p-2">{{$local[0]->Dia}}-{{$local[0]->Mes}}-{{$local[0]->Ano}}</span></div>
   <div class="col-sm-6 text-dark text-right"><i class="far fa-map-marker-alt"></i><span class="h6 p-2">{{$local[0]->Ciudad}}</span></div>
   </div>
    </div>
    

    </div>




  </div>

</div>
</div>