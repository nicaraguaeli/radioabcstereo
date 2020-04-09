@extends('layouts.master')
@section('contenido')

<div class="row">
  @isset($nosotros)
  <form action="{{route('nosotro.update',$nosotros->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="row">
          <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Seccion Nosotros
                <small>99.7</small>
              </h3>
              <!-- tools box -->
        </div>
        
             
                   
              
              <!-- /. tools -->
          
            <!-- /.card-header -->
            <div class="container">
           
               
                
                 

               
                 <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  Generar Url de Imagen
                </button>
                  
                    </div>
                  </div>
                  </div>
                </div>
                </div>
            <div class="card-body pad">
              <div class="mb-3">
                <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$nosotros->contenido}}</textarea>
              </div>
              <button type="submit">Publicar/Actualizar</button>
            </div>
          </div>
        </div>
        </form>
        <!-- /.col-->
      </div>
      <div class="modal fade" id="modal-info" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Gererador de URLs</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                    <form id="form" method="post" enctype="multipart/form-data">
                      @csrf
                       <label for="exampleInputFile">Copia la url y pegalo en la opcion insertar imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input accept="image/*" name="imageurl" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">generar url</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text" type="submit">Generar</button>
                      </div>
                    </div>

                    </form>
                   <label id="urlgenerada" class="mt-1" for=""></label>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @else
  <div class="row">
<form action="{{route('nosotro.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="container">
     <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Seccion Nosotros
                <small>99.7</small>
              </h3>
  </div>
       
              <!-- tools box -->
             
             
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
         

             
                 <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  Generar Url de Imagen
                </button>
                  
                    </div>
                  </div>
                  </div>
                </div>
                </div>
            <div class="card-body pad">
              <div class="mb-3">
                <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <button type="submit">Publicar</button>
            </div>
          </div>
        </div>
        </form>
        <!-- /.col-->
      </div>
      <div class="modal fade" id="modal-info" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Gererador de URLs</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                    <form id="form" method="post" enctype="multipart/form-data">
                      @csrf
                       <label for="exampleInputFile">Copia la url y pegalo en la opcion insertar imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input accept="image/*" name="imageurl" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">generar url</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text" type="submit">Generar</button>
                      </div>
                    </div>

                    </form>
                   <label id="urlgenerada" class="mt-1" for=""></label>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endif

       

      <script>
$(document).ready(function(){
 
    bsCustomFileInput.init();
    
  $("#country").change(function() {
   
        //Do stuff
        var id = $(this).val();



  
 var request = $.ajax({
  url: "{{url('getCities')}}",
  method: "get",
  data: { id : id },
  
});
 
request.done(function( msg ) {
  
  $('#cities').children().remove();
   $('#cities').append(new Option());
  $.each( msg, function( key, value ) {
  //alert( key + ": " + value.name );
  
  $('#cities').append(new Option(value.name,value.id));
});

});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});
        
    
});

$("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "{{route('imagen')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
  
   },
   success: function(data)
      {
         console.log(data);
         $('#urlgenerada').append(data);
      },
     error: function(e) 
      {
        console.log("Error"+e);
      }          
    });
 }));


});
</script>   
@endsection