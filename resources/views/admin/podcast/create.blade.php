@extends('layouts.master')
@section('contenido')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<form action="{{route('podcast.store')}}" id="audio" method="post" enctype="multipart/form-data" autocomplete="off">
  @csrf
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h3 class="card-title">
          Información del Podcast
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
            <input required name="titulo" type="text" class="form-control" id="inputEmail3" placeholder="Titulo">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Breve descripción</label>
          <div class="col-sm-12">
            <input required name="descripcion" type="text" class="form-control" id="inputEmail3" placeholder="descripción">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
          <div class="col-sm-12">
            <input required name="categoria" type="text" class="form-control" id="tags" placeholder="Categoria">
          </div>
        </div>
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->
          <label for="">Imagen (128px * 128px)</label>
          <div class="custom-file">
            <input required accept="image/png, image/jpeg" name="imagen" type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Imagen</label>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <!-- <label for="customFile">Custom File</label> -->
              <label for="">Audio (mp3) </label>
              <div class="custom-file">
                <input accept=".mp3,audio/*" required name="audio" type="file" class="custom-file-input" id="customFileAudio" value="Submit">
                <label class="custom-file-label" for="customFile">Subir audio</label>
              </div>
            </div>
            <div class="progress">
              <div class="progress-bar" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
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
            <textarea name="texto" class="textarea" placeholder="Escribe tu nota aqui" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
  $(function() {
    bsCustomFileInput.init();


    bsCustomFileInput.init();


    var availableTags = [];
    i = -1;

    $.ajax({
      url: "{{url('getCategoria')}}",
      type: 'get',
      success: function(data) {
        $.each(data, function(key, value) {
          availableTags[++i] = value.categoria;
        });

      }
    });




    $("#tags").autocomplete({
      source: availableTags
    });

  });
</script>

<script type="text/javascript">
 
    function validate(formData, jqForm, options) {
      
        var form = jqForm[0];
        if (!form.audio.value) {
            alert('File not found');
            return false;
        }
    }
 
    (function() {
 
    var bar = $('.progress-bar');
    var percent = $('.progress-bar');
    var status = $('#status');
 
    $('form').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=audio]').value;
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Wait, Saving';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
            alert('Subido con éxito');
            window.location.href = "../podcast";
        }
    });
     
    })();
</script>
@endsection