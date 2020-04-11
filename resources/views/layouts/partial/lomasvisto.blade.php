  <div class="container">
           <p class="text-center text-white font-weight-bold azul-fuerte" >LO MÁS VISTO</p>
       </div>
      

        <div id="card-content" class="container">
         @foreach($masvisto as $mas)
         <a href="{{url('nota',$mas->ID.'_'.Str::slug($mas->Titular,'-'))}}">
           <div class="card" >
  <img src="{{asset(''.$mas->Imagen)}}" class="card-img-top" alt="...">
  <div class="card-body text-white azul-claro" >
    <div class="row justify-content-around">
      <div class="col-xs-6"><p style="font-size: 1rem;" class="card-text text-white">{{$mas->Titular}}</p></div>
       <div class="col-xs-6"><i class="fas fa-arrow-circle-right text-white" style="font-size: 20px;"></i></div>
       
    </div>
   
  </div>
</div>
         </a>
                   
@endforeach
     
          
        </div>