 <a class="text-decoration-none" href="{{url('nota',$global_nota->ID.'_'.Str::slug($global_nota->Titular,'-'))}}">
   <div class="card border-0 shadow mb-2 position-relative ">
   <div class="lds-dual-ring position-absolute {{$global_nota->ID}}"></div>
     <img src="{{asset('img/placeholder2.jpg')}}" name="{{$global_nota->ID}}"  class="card-img-top rounded" alt="{{$global_nota->Titular}}" ref-src="{{asset(''.$global_nota->Imagen)}}">
     <div class="card-body text-white">
       <div class="row justify-content-around">
         <div class="col-xs-6 p-1">
            <span class="badge bg-red text-white">{{$global_nota->Area}}</span>
           <h4 style="min-height: 110px;" class="h4 text-dark auto-height font-weight-bold">{{$global_nota->Titular}}</h4>
         </div>
          
       </div>
       
         
           <div class="text-primary  "><i class="fal fa-clock mr-1"></i><span>{{$global_nota->Dia}}-{{$global_nota->Mes}}-{{$global_nota->Ano}}</span>
           </div>
         
        

     </div>
   </div>
 </a>