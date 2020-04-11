 
    
   <a href="{{url('nota',$global->ID.'_'.Str::slug($global->Titular,'-'))}}">
            <div class="card border-0  "  >
  <img src="{{asset(''.$global->Imagen)}}" class="card-img-top rounded" alt="{{$global->Titular}}">
  <div class="card-body text-white" >
   <div class="row justify-content-around">
       <div class="col-xs-6"><h4  style="min-height: 155px;" class="h4 text-dark auto-height font-weight-bold">{{$global->Titular}}</h4></div>
       <div class="col-xs-6 "><p class="card-text text-dark   " style="min-height: 70px;
overflow: hidden; font-size: 1rem;">{{$global->Descripcion}}</p>

 
 </div>
    </div>
    <div class="row  flex-nowrap ">
  <div class="col-sm-6"><div class="text-dark  "><i class="far fa-eye mr-1"></i><span>{{ number_format($global->Leido) }}</span>
    </div></div>
  <div class="col-sm-6"><div><span class="btn btn-primary" >Más</span>
  </div></div>
    
  

  </div>

  </div>
</div>
        </a>