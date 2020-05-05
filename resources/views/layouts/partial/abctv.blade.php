<section>

<div class="row">
	<div class="col-lg-6">
	<a href="{{url('abctv')}}"><div class="d-flex border-bottom mt-5 text-white azul-medio"  >
		<div class="tag ml-1 mt-1" style="background-color: #e8e8e8; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<h5 class="h5 font-weight-bold ml-2 mt-1 wow fadeInUp" data-wow-delay="0.2s">ABCtv</h5>
	  </div>
         </a>
	   @isset($abctvdes)
			  <div id="card-content" class="container">
       
                   <div class="card border-0 wow fadeInUp" >
  <div  class="embed-responsive embed-responsive-16by9 youtube-video" style=" background-color: black;">
						
					<iframe class="embed-responsive-item"   id="frame"  height="400" src="{{$abctvdes->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
						
 				
 				
                 
 			</div>
  <div class="card-body" >
    <div class="row justify-content-between">
      <div class="col-xs-6"><p class="card-text wow bounceInLeft"><a class="text-dark h4" href="{{url('abctvsearch',$abctvdes->id.'_'.Str::slug($abctvdes->titulo,'-'))}}">{{$abctvdes->titulo}}</a></p></div>
       <div class="col-xs-6"><a href="#"><i class="fas fa-arrow-circle-right " style="font-size: 20px;"></i></a>
       	
       </div>
       
    </div>
    <div class="d-flex justify-content-between">
	  	 		<div><i class="fad fa-id-card mr-1"></i>{{$abctvdes->autor}}</div>
	  	 			<div><i class="fal fa-clock mr-1"></i>Publicado el: {{date('d-m-Y',strtotime($abctvdes->created_at))}}</div>
	  	 	</div>
    </div>
    </div>

     
          
        </div>
         @endif

</div>

<div class="col-lg-6">

	  <a href="{{url('abc/podcast')}}"><div class="d-flex border-bottom mt-5 text-white azul-medio"  >
		<div class="tag ml-1 mt-1" style="background-color: #e8e8e8; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>

		<h5 class="h5 font-weight-bold ml-2 mt-1 wow fadeInUp" data-wow-delay="0.2s">Podcast</h5>
	  </div>
	  </a>
<div class="row">
	<div class="col-md-12">
			<img class="img-fluid mt-2 bg-dark" src="{{asset('img/PODCAST-IMG.png')}}" alt="">
	</div>

	 	<div class="col-md-12 mt-3 wow fadeIn">
	 		<a href="{{url('transmisiones')}}">
	  	    <p class="text-center text-white azul-fuerte" >ÚLTIMAS TRANSMISIONES EN VIVO</p>
	  	 </a>
	  	 <ul class="list-unstyled ">
	  	 	
      @foreach($transmision as $trans)

	  	 	<li class="border-bottom pb-3"><i class="fas fa-play text-info" style="font-size: 15px;"></i><a target="_blank" class="ml-2 text-decoration-none " href="{{$trans->url}}">{{$trans->titulo}}</a></li>
	  	 	
	  @endforeach	
	  	 	
	  	 </ul>
	  	 
	  	
	  	 
	  	</div>
</div>
</div>
</div>



	

</section>
