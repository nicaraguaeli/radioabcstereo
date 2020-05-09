@extends('layouts.master')
@section('contenido')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<form action="{{route('abctva.update',$video->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
@csrf
@method('PUT')
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Código de inserción del video</label>
                    <div class="col-sm-12">
                      <input required value="{{$video->frame}}" name="url" type="text" class="form-control" id="inputEmail3" placeholder="Codigo">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-12 ui-widget">
                      <input value="{{$video->titulo}}" required name="titulo" type="text" class="form-control ui-autocomplete-input" id="inputEmail3" placeholder="Titulo">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de video</label>
                    <div class="col-sm-12">
                      <input value="{{$video->tipo}}" required name="tipo" type="text" class="form-control" id="tags" placeholder="Tipo">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>descripción</label>
                        <textarea required name="descripcion" class="form-control" rows="3" placeholder="Escribir ...">{{$video->descripcion}}</textarea>
                      </div>
                    </div>
                     
                     

                     <div class="col-sm-12">
                    <div class="form-group">
                  <label>fecha de publicación (dia-mes-año)</label>
                  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input required value="{{date('d-m-Y',strtotime($video->created_at))}}"   type="text" name="date" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>
                   </div>
                  </div>
                 
                 <div class="row">
                  <div class="form-group">
                     <label for="">Imagen actual</label>
                   <div class="col-sm-6">
                     <img width="64" src="{{asset(''.$video->thumbnail)}}" alt="">
                   </div>
                  </div>
                  
                 </div> 

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Imagen (Opcional) </label>
                    <div class="custom-file">                 
                      <input accept="image/png, image/jpeg"  name="imagen" type="file" class="custom-file-input" id="customFile">
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
                          @if($perio->nombre == $video->autor)
                          <option selected value="{{$perio->nombre}}">{{$perio->nombre}} | {{$perio->tipo}}</option>
                          @endif
                          <option value="{{$perio->nombre}}">{{$perio->nombre}} | {{$perio->tipo}}</option>
                          @endforeach
                          
                        </select>
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