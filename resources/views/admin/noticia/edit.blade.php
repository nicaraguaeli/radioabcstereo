@extends('layouts.master')
@section('contenido')

<div class="row">
<form action="{{route('noticia.update',$nota->ID)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Editor de noticas ABC
                <small>99.7</small>
              </h3>
              <!-- tools box -->
             
                   
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
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
                        @isset($pais)
                        <option value=""></option>
                         <option selected value="{{$pais->id}}">{{$pais->name}}</option>
                         @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                        @else
                        <option value=""></option>
                        @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                        @endif
                        
          
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Ciudad</label>
                        <select id="cities" name="ciudad" class="form-control">
                          @isset($ciudad)
                             <option value=""></option>
                             <option selected value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                          @else

                          @endif

                         
                         
                        
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Pediodista</label>
                        <select name="autor" class="form-control">
                          @php
                           $bool = false;
                           $contador = count($periodista);
                          @endphp
                          @foreach($periodista as $perio)
                          @if($nota->Autor == $perio->nombre)
                           <option selected="true" >{{$nota->Autor}}</option>
                           
                          @php
                          $bool = true;
                          @endphp
                           
                          @else
                            @php
                              $contador -= 1;
                            @endphp
                            <option value="{{$perio->nombre}}">{{$perio->nombre}}</option>
                            @if($bool == false && $contador == 0)
                               <option selected value="{{$nota->Autor}}">{{$nota->Autor}}</option>
                            @endif
                          
                         
                         
                           
                          @endif
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
                        
                          
                          <option selected>{{$nota->Area}}</option>
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
                      <input required name="titular" type="text" class="form-control" id="inputEmail3" placeholder="Titular" value="{{$nota->Titular}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Breve descripción</label>
                        <textarea required name="descripcion" class="form-control" rows="3" placeholder="Escribir ...">{{$nota->entrada}}</textarea>
                      </div>
                    </div>
                 
                  </div>

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <img width="64" src="{{asset(''.$nota->Imagen)}}" alt="">
                  <label for="">Imagen Destacada</label>
                    <div class="custom-file">                 
                      <input accept="image/*" name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen Destacada</label>
                    </div>
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
            <div class="card-body pad">
              <div class="mb-3">
                <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$nota->Contenido!!}{!!$nota->Contenido2!!}</textarea>
              </div>
              <button type="submit">Actualizar</button>
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