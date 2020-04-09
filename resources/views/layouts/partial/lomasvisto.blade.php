  <div class="container">
           <p class="text-center" style=" background-color: #ddd; font-weight: bold;">LO MÁS VISTO</p>
       </div>
      

        <div id="card-content" class="container">
         @foreach($masvisto as $mas)
         <a href="{{url('nota',$mas->ID.'_'.Str::slug($mas->Titular,'-'))}}">
           <div class="card" >
  <img src="{{asset(''.$mas->Imagen)}}" class="card-img-top" alt="...">
  <div class="card-body text-white" style="background-color: #07155a;">
    <div class="row justify-content-around">
      <div class="col-xs-6"><p class="card-text text-white">{{$mas->Titular}}</p></div>
       <div class="col-xs-6"><a href="{{url('nota',$mas->ID.'_'.Str::slug($mas->Titular,'-'))}}"><i class="fas fa-arrow-circle-right text-white" style="font-size: 20px;"></i></a></div>
       
    </div>
   
  </div>
</div>
         </a>
                   
@endforeach
     
          
        </div>