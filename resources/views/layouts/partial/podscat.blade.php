<section>
	<div class="d-flex border-bottom mt-5 text-white bg-dark"  >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<h5 class="h5 font-weight-bold ml-2 wow fadeInUp" data-wow-delay="0.2s">Podscat</h5>
	  </div>
	  <ul class="list-group">
	  	@foreach($podscats as $pod)
  <li class="list-group-item  justify-content-between">
  	<div class="d-flex  align-items-center justify-content-between">
  		<div>
  			
  			<span class="span-play" id="play_{{$pod->id}}" ><i class="fal fa-play-circle" style="font-size: 25px; color: #c8c8c8 !important;"></i></span> 
  		</div>
  		<div class="align-self-center ml-2 font-weight-bold">
  			{{$pod->titulo}}
  		</div>
  		 <div>
    	 <span class="badge badge-primary badge-pill">14</span><i class="fas fa-ear-muffs ml-2" ></i>
    </div>
  	</div>
    <div>
    	{{$pod->entrada}}
    </div>
  <div class="mt-1"><i class="fad fa-id-card mr-1"></i>{{$pod->autor}} <i class="fal fa-clock ml-2"></i>{{$pod->created_at}}</div>
   <audio class="player" id="player_{{$pod->id}}">
 
  <source src="{{asset(''.$pod->url)}}" type="audio/mpeg">

Your browser does not support the audio element.
</audio> 
   
  </li>
 @endforeach
 
</ul>




 
 





 <script>

 	$(function(){
      
      $('.player').attr('controls',false);
        bool = false;
       $('.span-play').click(function()
       {    
       	    id = $(this).attr('id');
       	    ids = id.split('_');
       	    console.log(ids);
            
       	    if($(this).find('i').hasClass('fa-play-circle') && bool == false)
		    {
		    	   
		    	    $(this).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
		    		
		    		$('#player_1').trigger('play');
		    		 

                 bool = true;
                 return bool;
		    }


		    if($(this).find('i').hasClass('fa-play-circle'))
		    {
		    	$('.player').trigger('pause');
		    	$(this).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
		    		
		    		$('#player_'+ids[1]).trigger('play');
		    		console.log($('#player_'+ids[1]).currentTime);

		    		

		    }
		    else
		    {    
		    	   
              
		    		$(this).find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');

		    		$('#player_'+ids[1]).trigger('pause');


		    }
       	    
		    
		   
		   
          		 
       	  
           
       });

       


 	});
 	
  


 </script>
</section>