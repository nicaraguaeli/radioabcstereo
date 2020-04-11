$(function(){

//Spin
$("#spinner").fadeOut("slow", function(){
       $("#spinner").remove();
    });
     $( "#topScroll" ).fadeOut( "slow", function() {
    // Animation complete
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
//Fin Spin


//ancho
if($(window).width() < 990)
   {
       //Header
       $('.navbar').css("height","auto");
       $('.buscador').css("display","block");
       $('#logo-small').css('display','block');
       $('.hide-element').css("display","none");
       $('#logo-rect').css("display","none");
       $('.escuchanos').css("display","block");
       $('.escuchanos-nav').css("display","block");
       //Fin Header

       //Slider
       $('#card-content').addClass( "d-flex" );
       $('.info-nota').addClass('flex-column');
       $('.titular').removeClass( "h1" ).addClass('h3');
       $('#seccion-nota').css("display",'none');

       $('.auto-height').css("min-height","auto");
       
       //Fin Slider

     
   }
   else
   {
       $('.navbar').css("height","30px");
       $('.buscador').css("display","none");
       $('#logo-small').css('display','none');
       $('#logo-rect').css("display","none");
       $('.hide-element').css("display","none");
       $('.escuchanos').css("display","none");
       $('.escuchanos-nav').css("display","none");
   }
//Fin ancho
$( window ).resize(function() {
   
   if($(window).width() < 990)
   {
      
        $('#card-content').addClass( "d-flex" );
        $('.info-nota').addClass('flex-column');
        $('#seccion-nota').css("display",'none');
        $('.titular').removeClass( "h1" ).addClass('h3');
         $('.escuchanos-nav').css("display","none");
        $('.buscador').css("display","block");
        $('.navbar').css("height","auto");
        $('#logo-small').css('display','block');
        $('.hide-element').css("display","block");

        $('.navbar').removeClass("fixed-top");

         $('#logo-rect').css("display","none");
         $('.escuchanos').css("display","block");
      
     
   }
   else
   {
         $('#card-content').removeClass( "d-flex" );
         $('.info-nota').removeClass('flex-column');
         $('.titular').removeClass( "h3" ).addClass('h1');
         $('#seccion-nota').css("display",'block');

        $('.buscador').css("display","none");
        $('.header').css("display","block");
        $('.hide-element').css("display","none");
        $('#logo-small').css('display','none');
        $('.navbar').css("height","30px");

         $('#logo-rect').css("display","none");
         $('.escuchanos').css("display","none");
          $('.escuchanos-nav').css("display","none");
       

   }
});


 $(window).scroll(function() {
  var height = $(window).scrollTop();
  var ancho = $(window).width();
  if(height < 10 && ancho > 990) {
     
       $('.navbar').removeClass("fixed-top");
       $('.hide-element').css('display','none').removeClass('ml-3 mt-2');
       $('#logo-rect').css('display','none');
       $('.escuchanos-nav').css("display","none");


     
  } else if(height > 10 && ancho > 990) {
   
   $('.navbar').addClass("fixed-top");
  
   $('.hide-element').css('display','block').addClass('ml-3 mt-2');
   $('#logo-rect').css('display','block');
   $('.escuchanos-nav').css("display","block");
  }
});

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