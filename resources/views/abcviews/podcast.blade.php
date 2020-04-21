@extends('layouts.home')
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <div class="row mt-5">
    	 
    <div class="col-lg-12">
    	
	<div class="d-flex" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">ABC</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">podscat</h4></div>
		
		
	
     </div>

    </div>	
        

	 </div>


	 <div class="row mt-2" style="background: #004064;">
	 	<div class="col-lg-12" >
	 		<img class="img-fluid" src="{{asset('img/podcast.png')}}" alt="">

	 	</div>
	 	<div class="col-sm-12">
	 		<div class="form-group">
    <label class="text-white" for="exampleFormControlSelect1">Categorias</label>
    <form action="">

    <select class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit()">
      <option>Salud</option>
      <option>Deporte</option>
      <option>Politica</option>
      <option>Alimentacion</option>
      <option>Educacion</option>
    </select>
    	
    </form>
   
  </div>
	 	</div>
	 </div>
 <audio id="player-podscat">
 
  <source src="" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 

<div class="row ">
	<div class="col-lg-6 " style="background: #cacaca;">
	<ul class="list-unstyled mt-2">

		@foreach($podcast as $podcast)
			<li class="mb-3"><div style="background: #f2f2f2;
width: 100%;
height: 3rem;
border-radius: 10px;">
	
	<div class="d-flex">
		

		<div  ><button  name="{{asset(''.$podcast->url)}}-{{$podcast->id}}" class="btn play-podcast"><i style="font-size: 2rem;" class="fas fa-play-circle  ml-2 "></i></button></div>
		<div class="ml-2">{{$podcast->titulo}} </div>

	</div>

</div>
</li>
	
@endforeach



			
		</ul>
	</div>
	<div class="col-lg-6 border-right border-bottom azul-claro text-white">
	 
	 <div class="d-flex border-bottom mt-2">
	 	<div><img id="img-podcast" width="128" src="https://www.bbva.com/wp-content/uploads/2018/08/Podcast-bbva-1024x678.jpg" alt=""></div>
	 	<div class="ml-2 podcast-tittle">ESTAS EN PODCATS <br>
	 	<h5 class="font-weight-bold " >¡Empieza a escuchar!</h5></div>
	 </div>

      <p class="mt-3"></p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Más
</button>



      <div class="row justify-content-center mb-2">
      	<div title="Atras 5s"    onclick="backward()"  class="col-sx-3"><i class="fas fa-backward" style="font-size: 48px;"></i></div>
      	<div  title="Reproducir" id="play" class="col-sx-3"><i class="fas fa-play-circle ml-2 mr-2 text-white" style="font-size: 48px;"></i></div>
      	<div title="Adelante 5s" onclick="forward()" class="col-sx-3"><i class="fas fa-forward" style="font-size: 48px;"></i></div>
      </div>

      <div class="progress-bar " style="height: 5px; width: 100%; position: absolute; bottom: 0; background: green;">
      	
      </div>

	</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detalle del podcast</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <div class="contenido">
      	
      </div>  
        
      



      </div>
      
    </div>
  </div>
</div>
<script>
	$(function(){
          
         

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
              			$('#img-podcast').attr('src','{{asset('')}}'+data.imagen);


              			console.log(data)
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
    
	
</script>
@endsection