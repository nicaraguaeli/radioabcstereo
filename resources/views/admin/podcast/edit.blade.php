@extends('layouts.master')
@section('contenido')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('podcast.update',$podcast->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Actualizar Podcast
                <small>podcast</small>
              </h3>
              <!-- tools box -->
             
            
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="container">
           
                
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-12">
                      <input value="{{$podcast->titulo}}" required name="titulo" type="text" class="form-control" id="inputEmail3" placeholder="Título">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Breve descripción</label>
                    <div class="col-sm-12">
                      <input value="{{$podcast->entrada}}" required name="descripcion" type="text" class="form-control" id="inputEmail3" placeholder="descripción">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-12">
                      <input value="{{$podcast->categoria}}" required name="categoria" type="text" class="form-control" id="inputEmail3" placeholder="categoria">
                    </div>
                  </div>
                  <div class="row">
                    <img src="{{asset(''.$podcast->imagen)}}" alt="">
                  </div>
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Imagen (128px * 128px) (opcional)</label>
                    <div class="custom-file">                 
                      <input  accept="image/png, image/jpeg" name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen</label>
                    </div>
                  </div>

                    <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Audio (mp3) (opcional)</label>
                    <div class="custom-file">                 
                      <input accept=".mp3,audio/*"  name="audio" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Subir audio</label>
                    </div>
                  </div>
                  </div>
                </div>
                      <!-- select -->
                      <div class="form-group row">
                        <div class="col-sm-12">
                             <label>Periodista</label>
                        <select name="autor" class="form-control">
                        
                          @foreach($periodistas as $perio)
                          <option value="{{$perio->nombre}}">{{$perio->nombre}} | {{$perio->tipo}}</option>
                          @endforeach
                          
                        </select>
                        </div>
                       
                      </div>
                    
                <div class="card-body pad">
              <div class="mb-3">
                <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$podcast->contenido!!}</textarea>
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
    bsCustomFileInput.init();

     bsCustomFileInput.init();


           var availableTags=[];
           i = -1;
           
           $.ajax({
              url: "{{url('getCategoria')}}",
              type: 'get',
              success: function (data) {
                $.each(data, function(key, value) {
               availableTags[++i]=value.categoria;
              });
              
            }
});
          

             
     
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
</script>

@endsection