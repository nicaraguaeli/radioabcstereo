<section class="container">
	<div class="d-flex border-bottom" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<h5 class="h5 font-weight-bold ml-2 wow fadeInUp" data-wow-delay="0.2s">ABCtv</h5>
	  </div>

	  <div class="row mt-5">
	  	
	  	<div class="col-lg-6">
	  		   
	  		   @isset($abctvdes)
			  <div id="card-content" class="container">
       
                   <div class="card border-0 wow fadeInUp" >
  <img src="{{asset(''.$abctvdes->thumbnail)}}" class="card-img-top" alt="">
  <div class="card-body" >
    <div class="row justify-content-between">
      <div class="col-xs-6"><p class="card-text wow bounceInLeft"><a class="text-dark h4" href="{{url('abctv')}}">{{$abctvdes->titulo}}</a></p></div>
       <div class="col-xs-6"><a href="#"><i class="fas fa-arrow-circle-right " style="font-size: 20px;"></i></a></div>
       
    </div>
   
    </div>
    </div>

     
          
        </div>
         @endif
	  	</div>
	  	<div class="col-lg-6 wow fadeIn">
	  	 <p class="text-center" style=" background-color: #ddd; font-weight: bold;">ÚLTIMAS TRANSMISIONES EN VIVO</p>
	  	 <ul class="list-unstyled ">
	  	 	@foreach($podscats as $podscat)


	  	 	<li class="border-bottom pb-3"><i class="fas fa-play text-info" style="font-size: 15px;"></i><a target="_blank" class="ml-2 " href="{{$podscat->url}}">{{$podscat->titulo}}</a></li>
	  	 	
	  	 	@endforeach
	  	 </ul>
	  	 
	  	
	  	 
	  	</div>
	  </div>
</section>
