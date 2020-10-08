 <a class="text-decoration-none" href="{{url('nota',$global_nota->ID.'_'.Str::slug($global_nota->Titular,'-'))}}">
   <div class="card border-0 shadow mb-2  ">
     <img src="{{asset(''.$global_nota->Imagen)}}" class="card-img-top rounded" alt="{{$global_nota->Titular}}">
     <div class="card-body text-white">
       <div class="row justify-content-around">
         <div class="col-xs-6">
            <span class="badge badge-danger">{{$global_nota->Area}}</span>
           <h4 style="min-height: 110px;" class="h4 text-dark auto-height font-weight-bold">{{$global_nota->Titular}}</h4>
         </div>
          
       </div>
       
         
           <div class="text-primary  "><i class="fal fa-clock mr-1"></i><span>{{$global_nota->Dia}}-{{$global_nota->Mes}}-{{$global_nota->Ano}}</span>
           </div>
         
        

     </div>
   </div>
 </a>