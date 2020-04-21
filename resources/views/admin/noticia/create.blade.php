@extends('layouts.master')
@section('contenido')

<div class="row">
<form action="{{route('noticia.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
@csrf
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Editor de noticas ABC
                <small>99.7</small>
              </h3>
              <!-- tools box -->
             
                   
             
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="container">
            <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Pais</label>
                        <select id="country" class="form-control" name="pais">
                        <option selected="true" disabled="disabled">Selecciona un pais</option>
                        <option value=""></option>
                        @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
          
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Ciudad</label>
                        <select id="cities" name="ciudad" class="form-control">
                          
                          <option></option>
                         
                        
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Periodista</label>
                        <select name="autor" class="form-control">
                        
                          @foreach($periodistas as $perio)
                          <option value="{{$perio->nombre}}">{{$perio->nombre}} | {{$perio->tipo}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                </div>  
                <div class="row">
                <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Area</label>
                        <select name="area" class="form-control">
                        
                          
                          <option >Departamental</option>
                           <option >Local</option>
                            <option >Nacional</option>
                             <option >Internacional</option>
                         
                          
                        </select>
                      </div>
                    </div>
                  
                </div>  
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Titular</label>
                    <div class="col-sm-12">
                      <input required name="titular" type="text" class="form-control" id="inputEmail3" placeholder="Titular">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Breve descripción</label>
                        <textarea required name="descripcion" class="form-control" rows="3" placeholder="Escribir ..."></textarea>
                      </div>
                    </div>
                 
                  </div>

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Imagen Destacada (850px ancho por 450px alto)</label>
                    <div class="custom-file">                 
                      <input accept="image/*" required name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen Destacada</label>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-12"> 
                     
                     <div class="form-group">
                      <label>Texto de referencia de la imagen</label>
                       <input  name="referencia" type="text" class="form-control"  placeholder="Referencia">
                     </div>
                  </div>
                </div>
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
           
              <div class="mb-3">
                <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <button type="submit">Publicar</button>
           
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