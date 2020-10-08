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


//width
if($(window).width() < 990)
   {
       //Header
       $('.navbar').css("height","auto");
       $('.buscador').css("display","block");
       $('#logo-small').css('display','block');
       $('.hide-element').css("display","none");
       $('.nav-hidden').css("display","none");
       $('.escuchanos').css("display","block");
       $('.escuchanos-nav').css("display","block");
       $('.template-des').css("width","100%").removeClass('ml-4');
       $('.pagination').addClass('pagination-sm');
       $('.nav-item').removeClass('nav-link-hover');

       //Fin Header

       //Slider
       $('#card-content').addClass( "d-flex" );
       $('.info-nota').addClass('flex-column');
       $('.titular').removeClass( "h1" ).addClass('h3');
       $('#seccion-nota').css("display",'none');

       $('.auto-height').css("min-height","auto");

       $('.template').addClass('flex-column');
      
       
       //Fin Slider

     
   }
   else
   {
       $('.navbar').css("height","40px");
       $('.buscador').css("display","none");
       $('#logo-small').css('display','none');
       $('.nav-hidden').css("display","none");
       $('.hide-element').css("display","none");
       $('.escuchanos').css("display","none");
       $('.escuchanos-nav').css("display","none");

       $('.template').addClass('flex-row');
        $('.template-des').css("width","13rem").addClass('ml-4');

         $('.pagination').removeClass('pagination-sm');
   }
//Fin width
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

         $('.nav-hidden').css("display","none");
         $('.escuchanos').css("display","block");

         $('.template').addClass('flex-column');

          $('.template-des').css("width","100%").removeClass('ml-4');

           $('.pagination').addClass('pagination-sm');
            $('.nav-item').removeClass('nav-link-hover');

      
     
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
        $('.navbar').css("height","40px");

         $('.nav-hidden').css("display","none");
         $('.escuchanos').css("display","none");
          $('.escuchanos-nav').css("display","none");

          $('.template').addClass('flex-row');

           $('.template-des').css("width","13rem").addClass('ml-4');
            $('.pagination').removeClass('pagination-sm');
             $('.nav-item').addClass('nav-link-hover');

       

   }
});

 var width = $(window).width();

 $(window).on('scroll',function() {
  var height = $(window).scrollTop();
  

  
  

 
  if(height < 250 && width > 990) {
     
       $('.navbar-fixed').removeClass("fixed-top ");

       $('.hide-element').addClass('d-none').removeClass('ml-3 mt-2');
       $('.nav-hidden').removeClass('d-block').addClass('d-sm-none');
       $('.escuchanos-nav').removeClass('d-block').addClass('d-none');


     
  } else if(height > 250 && width > 990) {
   
   $('.navbar-fixed').addClass("fixed-top");
   
  
   $('.hide-element').addClass('ml-3 mt-2 d-block');
   $('.nav-hidden').removeClass('d-sm-none').addClass('d-block');
   $('.escuchanos-nav').removeClass('d-none').addClass('d-block');
  }
});

//NOTICIA DESTACADA FIXED

if(width > 990)
{
    $(window).on("scroll",function(){
    height = $(window).scrollTop()
    if(height >465)
    {
      $(".destacado-fixed").addClass('position-sticky').css({top: "4rem",right: "8rem",overflow: "scroll","max-height": "100%"})
    }
    else
    {
      $(".destacado-fixed").removeClass('position-sticky').removeAttr("style")
    }
    
    
    
 });

}
 

 $('#btn-encuesta').on('click',function(event)
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
   
   $(this).addClass('w-100');
  });  

  //Fin CONTENIDO NOTA

  //ABCTV
  url = $('#frame').attr('src');
         const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
         const match = url.match(regExp);

         $('#frame').attr('src','//www.youtube.com/embed/'+match[2]);
  //FIN ABCTV

});