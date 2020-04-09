$(window).on('load', function () {
   $("#spinner").fadeOut("slow", function(){
       $("#spinner").remove();
    });
 
 
  });

$(document).ready(function()
{
     $( "#topScroll" ).fadeOut( "slow", function() {
    // Animation complete
  });
   
	//HEADER
	   if($(window).width() <= 990)
   {
       $('.navbar').addClass("fixed-top");
       $('.navbar').css("height","auto");
       $('.header').css("display","none");
       $('.buscador').css("display","block");
       $('#logo-small').css('display','block');
       $('.social-network').css("display","block");

     
   }

     $(window).resize(function()
     {
        if($(window).width() <= 990)
   {
       $('.header').css("display","none");
       $('.buscador').css("display","block");
       $('.navbar').css("height","auto");
       $('#logo-small').css('display','block');
       $('.social-network').css("display","block");
     
   }
   else
   {
        $('.buscador').css("display","none");
        $('.header').css("display","block");
        $('.social-network').css("display","none");
        $('#logo-small').css('display','none');
        $('.navbar').css("height","25px");
   }

     });

    
     $(window).scroll(function() {
  var height = $(window).scrollTop();
  var ancho = $(window).width();
  if(height < 10 && ancho > 990) {
     
       $('.navbar').removeClass("fixed-top");
       $('.social-network').css('display','none').removeClass('ml-3 mt-2');
       $('#logo-small').css('display','none');
     
  } else {
   $('.navbar').addClass("fixed-top");
  
   $('.social-network').css('display','block').addClass('ml-3 mt-2');
   $('#logo-small').css('display','block');
  }
});
	//FIN HEADER


	//NOTICIAS
	if($(window).width() <= 960)
   {
      
       $('.auto-height').css("min-height","auto");
       $('#container-master').addClass('p-0');

     
   }

     $(window).resize(function()
     {
        if($(window).width() <= 960)
   {
        $('.auto-height').css("height","auto");
        $('#container-master').addClass('p-0');
        $('#container-abctv').removeClass('mt-3');
        $('#frame').css("heigth","300");
        $('.col-youtube').addClass('p-0');
     
   }
   else
   {
        $('.auto-height').css("min-height","155");
        $('#container-master').removeClass('p-0');
        $('#container-abctv').addClass('mt-3');
        $('#frame').css("heigth","400");

   }

     });
      $(window).scroll(function(){
        if($(window).scrollTop() > 300)
        {
            
            $( "#topScroll" ).fadeIn( "slow", function() {
    // Animation complete
  });
      
        }
        else
        {
             $( "#topScroll" ).fadeOut( "slow", function() {
    // Animation complete
  });
             
        }
      });

	//FIN NOTICIAS


	//SLIDER
	 if($(window).width() <= 960)
   {
       $('#card-content').addClass( "d-flex" );
       $('.info-nota').addClass('flex-column');
       $('.titular').removeClass( "h1" ).addClass('h3');
       $('.wrapper').css( "margin-top", "50px" );
       $('#seccion-nota').css("display",'none');

     
   }


   $( window ).resize(function() {
   
   if($(window).width() <= 960)
   {
      $('#card-content').addClass( "d-flex" );
       $('.info-nota').addClass('flex-column');
      $('#seccion-nota').css("display",'none');
      $('.titular').removeClass( "h1" ).addClass('h3');
      $('.wrapper').css( "margin-top", "50px" );
     
   }
   else
   {
        $('#card-content').removeClass( "d-flex" );
         $('.info-nota').removeClass('flex-column');

        $('.titular').removeClass( "h3" ).addClass('h1');
        $('#seccion-nota').css("display",'block');
        $('.wrapper').css( "margin-top", "auto" );

   }
});
	//FIN SLIDER


	//CHECKED
     
    $('#btn-encuesta').click(function(event)
    {
    	event.preventDefault();
       
       id = $("input[name='groupOfDefaultRadios']:checked").val();
     
     
  var request = $.ajax({
  url: "{{url('calificacion')}}",
  method: "get",
  data: { id : id },
  
});
 
request.done(function( msg ) {
  
  
 $('#modalencuesta').modal('show');
 $('#encuesta').css("display","none");
  
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


    }); 
	
	//FIN CHECKED


  //CONTENIDO NOTA
  $("#contenido-nota").find('img').each(function() {  
   
   $(this).addClass('img-fluid');
  });  

  //Fin CONTENIDO NOTA

  //ABCTV
  url = $('#frame').attr('src');
         const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
         const match = url.match(regExp);

         $('#frame').attr('src','//www.youtube.com/embed/'+match[2]);
  //FIN ABCTV
});



