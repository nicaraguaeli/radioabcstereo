@extends('layouts.master')
@section('contenido')


<form action="{{route('empleo.update',$empleo->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Actualizar Empleo
                <small>Empleos ABC</small>
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
                   <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Pais</label>
                        <select id="country" class="form-control" name="pais">
                        <option selected="true" disabled="disabled">Selecciona un pais</option>
                        @foreach($countries as $country)
                          @if($ciudad->idp == $country->id)
                          <option selected value="{{$ciudad->idp}}">{{$ciudad->pais}}</option>
                          @endif
                          <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
          
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Ciudad</label>
                        <select id="cities" name="city_id" class="form-control">
                          
                         <option value="{{$ciudad->idc}}">{{$ciudad->ciudad}}</option>
                         
                        
                          
                        </select>
                      </div>
                    </div>
                
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cargo</label>
                    <div class="col-sm-12">
                      <input value="{{$empleo->cargo}}" required name="cargo" type="text" class="form-control" id="inputEmail3">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Empleador</label>
                    <div class="col-sm-12">
                      <input value="{{$empleo->empleador}}" required name="empleador" type="text" class="form-control" id="inputEmail3" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                       <div class="card-body pad">
              <div class="mb-3">
                <textarea name="descripcion" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$empleo->descripcion!!}</textarea>
              </div>
             
            </div>
                    </div>
                 
                  </div>
                   
                   <div class="col-sm-12">
                   	<div class="form-group">
                  <label>Expiración</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input value="{{$empleo->expiracion}}" required type="date" name="expiracion" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>
                   </div>

               
                
                </div>
                 <div class="row justify-items-between">
                  
                   <div class="col-lg-6 form-group"> <a href="{{url('admin')}}" type="submit" class="btn btn-info">Cancelar</a></div>
                    <div class="col-lg-6 form-group"> <button type="submit" class="btn btn-primary">Actualizar</button></div>
                 </div>
                </div>
           
          </div>
              
        </form>
        <!-- /.col-->
      </div>
    
      <script>
      	
       $(function()
       {
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
  $.each( msg, function( key, value ) {
  //alert( key + ": " + value.name );
  
  $('#cities').append(new Option(value.name,value.id));
});

});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});
        
    
});

       });

      </script>

@endsection

