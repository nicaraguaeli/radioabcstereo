@extends('layouts.master')
@section('contenido')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<form action="{{route('abctva.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
@csrf
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Información del Video
                <small>abctv</small>
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
           
                
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Url del Video</label>
                    <div class="col-sm-12">
                      <input required name="url" type="text" class="form-control" id="inputEmail3" placeholder="Url">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-12 ui-widget">
                      <input required name="titulo" type="text" class="form-control ui-autocomplete-input" id="inputEmail3" placeholder="Titulo">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de video</label>
                    <div class="col-sm-12">
                      <input required name="tipo" type="text" class="form-control" id="tags" placeholder="Tipo">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>descripción</label>
                        <textarea required name="descripcion" class="form-control" rows="3" placeholder="Escribir ..."></textarea>
                      </div>
                    </div>


                   <div class="col-sm-12">
                    <div class="form-group">
                  <label>Fecha de publicación</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input required type="date" name="date" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>
                   </div>
                 
                  </div>
                   

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Imagen </label>
                    <div class="custom-file">                 
                      <input accept="image/png, image/jpeg" required name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-12">
                       <select name="autor" class="form-control">
                        
                          @foreach($periodistas as $perio)
                          <option value="{{$perio->nombre}}">{{$perio->nombre}} | {{$perio->tipo}}</option>
                          @endforeach
                          
                        </select>
                    </div>
                  </div>
                </div>
                 <div class="row justify-items-between">
                  
                   <div class="col-lg-6 form-group"> <a href="{{url('admin')}}" type="submit" class="btn btn-info">Cancelar</a></div>
                    <div class="col-lg-6 form-group"> <button type="submit" class="btn btn-primary">Publicar</button></div>
                 </div>
                </div>
           
          </div>
              
        </form>
        <!-- /.col-->
      </div>
     
       <script>
         $(document).ready(function(){
          bsCustomFileInput.init();
           var availableTags=[];
           i = -1;
           
           $.ajax({
              url: "{{url('getData')}}",
              type: 'get',
              success: function (data) {
                $.each(data, function(key, value) {
               availableTags[++i]=value.tipo;
              });
              
            }
});
          
              
        


         
          

             
     
    $( "#tags" ).autocomplete({
      source: availableTags
    });
        });

       </script>

@endsection