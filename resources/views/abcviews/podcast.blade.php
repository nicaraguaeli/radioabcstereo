@extends('layouts.home')
@section('contenido')
<style>
  .hp_slide{
    width:100%;
   
    height:12px;
}
.hp_range{
    width:0;
    background: #7dabbd;
    height:12px;
    border-right: 4px solid #b4d3b4;
}
.badge-info:hover
{
   background-color: #f2f2f2;

}
.conte:hover
{
    background-color: white !important;
}



</style>
<div class="container">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
<div class="row mt-5">
    	 
    <div class="col-lg-12">
    	
	<div class="d-flex border-b mb-5" >
	
		<div><h4 class="h6 ml-2">ABC</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><a class="text-dark" href="{{url('abc/podcast')}}"><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">podcast</h4></a></div>
    @isset($tipo)
    <i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i><div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">{{$tipo}}</h4></div>
		@endif
		
	
     </div>

    </div>	
        

	 </div>
</div>
 

<div class="container mb-5">
<div class="row mt-2" style="background: #004064;">
	 	<div class="col-lg-12" >
	 		<img class="img-fluid" src="{{asset('img/podcast.png')}}" alt="">

	 	</div>
	 	<div class="col-sm-12">
	 	
   <div class="d-flex">
     
    @foreach($cat as $cat)
     
     <a class="ml-2" href="{{url('abc/podcast',$cat->categoria)}}"><h4><span class="badge badge-info">{{$cat->categoria}}</span></h4></a>
    
@endforeach
 

   </div>
   
   
 
	 	</div>
	 </div>
 <audio id="player-podscat">
 
  <source src="" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 

<div class="row ">
	<div class="col-lg-6 " style="background: #cacaca;">
    <h6 class="text-center p-2 azul-claro text-white font-weight-bold" >ESTAS EN PODCAST ABC <br>Selecciona un audio de nuestra lista y dale play</h6>
	<ul class="list-unstyled mt-2">

		@foreach($podcast as $pod)
			<li class="mb-3"><div class="conte" style="background: #f2f2f2;
width: 100%;
min-height: 3rem;
border-radius: 10px;">
	
	<div class="d-flex">
		

		<div class="align-self-center"  ><button title="play"  name="{{asset(''.$pod->url)}}-{{$pod->id}}" class="btn play-podcast"><i style="font-size: 2rem;" class="fas fa-play-circle  ml-2 "></i></button></div>
		<div class="ml-2 align-self-center">{{$pod->titulo}} </div>

	</div>

</div>
</li>
	
@endforeach



			
		</ul>
	</div>
	<div class="col-lg-6 border-right border-bottom azul-claro text-white">
	 
	 <div class="d-flex border-bottom mt-2">
	 	<div><img id="img-podcast" width="128" src="https://www.bbva.com/wp-content/uploads/2018/08/Podcast-bbva-1024x678.jpg" alt=""></div>
	 	<div class="ml-2 podcast-tittle"><br>
	 	<h5 class="font-weight-bold " ></h5>
    
   </div>
	 </div>

      <p class="mt-3 description"></p>
      <div class="contenido" style="height: 0px; overflow: hidden; transition: 0.3s all; "></div>
      <button type="button" class="btn btn-primary" id="btn-mas">
  Más
</button>
 


      <div class="row justify-content-center mb-2">
        
        <div class="col-xs-3">  <button type="button" class="btn" title="Atras 5s"    onclick="backward()"  class="col-sx-3"><i class="fas fa-backward text-white" style="font-size: 48px;"></i></button></div>
        <div class="col-xs-3">  <button type="button" class="btn"  id="play"  class="col-sx-3"><i class="fas fa-play-circle ml-2 mr-2 text-white" style="font-size: 48px;"></i></button></div>
        <div class="col-xs-3"><button type="button" class="btn" title="Adelante 5s" onclick="forward()" class="col-sx-3"><i class="fas fa-forward text-white" style="font-size: 48px;"></i></button></div>
        <div class="col-xs-3 align-self-center">
          <div >
           <span><a target="_blank" title="Abrir en nueva pestaña" class="text-white shared-link " href=""><i class="fas fa-share-alt text-white ml-1 mr-1"></i>Abrir en nueva pestaña</a></span>
          </div>
        </div>


      
      
      	
       
       
      </div>
        
      
      	
      </div>
<div class="hp_slide azul-claro">
     <div class="hp_range"></div>
</div>

  <div class="mt-3">{{$podcast->links()}}</div>
	</div>
</div>


<!-- Button trigger modal -->
</div>
	





<script>
	$(function(){
          
         
          $('#btn-mas').click(function(){
            
            $('.contenido').toggleClass('h-auto');

          });
          $('.play-podcast').click(function(){
                       
              ruta = $(this).attr('name').split('-');




            

             $('#player-podscat').attr('src',ruta[0]);


             
             
             $.ajax({
              		url: "{{url('getPodcast')}}",
              		type: 'get',
              		data: {id: ruta[1]},
              		success: function (data) {

              			$('.contenido').children().remove()
              			$('.contenido').append(data.contenido)
              			$('.podcast-tittle').find('h5').remove();
                    $('.podcast-tittle').append('<h5 class="font-weight-bold " >'+data.titulo+'</h5>');

                    $('.description').html('');
                    $('.description').html(data.entrada);
                    $('.shared-link').attr('href','{{url("abc/podcast/audio")}}'+"/"+data.id);
                  
              			
              			$('#img-podcast').attr('src','{{asset('')}}'+data.imagen);


              			
              		}
              	});
             
             




              
              if($(this).find('i').hasClass('fa-play-circle'))
              {
              	
              	
              	 	  
               $('.play-podcast').find('i').removeClass('fa-volume')
               $('.play-podcast').find('i').addClass('fa-play-circle')
               
              	
              	 	  
              	
 			    
                
              	$(this).find('i').removeClass('fa-play-circle')
              	$(this).find('i').addClass('fa-volume')
              	
                $('#play').find('i').removeClass('fa-play-circle')
              	$('#play').find('i').addClass('fa-pause-circle')
                $('#play').attr('tittle','Detener')

              	 $('#player-podscat').trigger('play');

              	
              }
              else
              {
              	  $('.play-podcast').find('i').removeClass('fa-volume')
                  $('.play-podcast').find('i').addClass('fa-play-circle')
               

              	$(this).find('i').removeClass('fa-volume')
              	$(this).find('i').addClass('fa-play-circle')
              	$('#play').find('i').removeClass('fa-pause-circle')
              	$('#play').find('i').addClass('fa-play-circle')
                $('#play').attr('tittle','Reproducir')


              	 
              }

              

          });
           
          


          


           
       

	});

	function forward()
	{
		
       
		document.getElementById("player-podscat").currentTime += 5;
    
		
	}

	function backward()
	{
		
       
		document.getElementById("player-podscat").currentTime -= 5;
	}
  $('#play').click(function(){
       
       if($(this).find('i').hasClass('fa-play-circle'))
              {
                  $('#play').find('i').removeClass('fa-play-circle')
                  $('#play').find('i').addClass('fa-pause-circle')

                   $('.play-podcast').find('i').removeClass('fa-volume')
                   $('.play-podcast').find('i').addClass('fa-play-circle')

                   $('#player-podscat').trigger('play');
            
              }
              else
              {
                  $('#play').find('i').removeClass('fa-pause-circle')
                  $('#play').find('i').addClass('fa-play-circle')

                  $('.play-podcast').find('i').removeClass('fa-volume')
                  $('.play-podcast').find('i').addClass('fa-play-circle')

                   $('#player-podscat').trigger('pause');
              }

  });
 

 var player = document.getElementById('player-podscat');    
player.addEventListener("timeupdate", function() {
    var currentTime = player.currentTime;
    var duration = player.duration;
    $('.hp_range').stop(true,true).animate({'width':(currentTime +.5)/duration*100+'%'},250,'linear');
});

	
</script>
@endsection