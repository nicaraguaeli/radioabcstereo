@extends('layouts.home')
@section('etiquetas')
<meta property="og:url" content="http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$nota->Titular}}" />
<meta property="og:description" content="{{   Str::limit($nota->entrada, 150, '...')    }}" />
<meta property="og:image" content="http://www.radioabcstereo.com/{{$nota->Imagen}}" />

<meta name="keywords" content="{{ str_replace(' ',',',$nota->Titular)}}" />

@endsection
@section('contenido')


<div class="container mt-5 ">
  <br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
  <div class="d-flex  ">
    <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
    <div>
      <h4 class="h6 ml-2">NOTICIA</h4>
    </div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
    <div>
      <h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">{{$nota->Area}}</h4>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
      <h1 class="font-weight-bold">{{$nota->Titular}}</h1>
      <h2 class="text-muted h5">{{$nota->entrada}}</h2>
    </div>
  </div>

</div>
<div class="container mt-5">
  <div class="row ">
    <!--FILA-PRINCIPAL-->
    <div class="col-12 col-sm-12 col-md-9 col-lg-9 ">
      <img class=" w-100 " src="{{asset(''.$nota->Imagen)}}" alt="{{$nota->referencia}}" title="{{$nota->referencia}}">

      <!--Pie de la imagen-->



      <div class="d-flex text-center justify-content-center text-muted">
        <div><i class="fas fa-camera mr-2"></i></div>
        <div>
          <small>{{$nota->referencia}}</small>
        </div>

      </div>
      <hr>



      <a title="Más notas sobre este autor" target="_blank" class="text-dark" href="{{url('noticias/'.$nota->Autor)}}">
        <div class="mr-3"><i class="fad fa-id-card "></i><span class="h6 p-2"><span class="badge badge-secondary mr-2">@foreach($periodistas as $perio)
              @if($perio->nombre == $nota->Autor)
              {{$perio->tipo}}
              @endif
              @endforeach
            </span>{{$nota->Autor}}</span></div>
      </a>

      <div class="d-md-flex">
        <div class="mr-3"><i class="fal fa-clock "></i><span class="h6 p-2 ">{{$fecha}}</span></div>
        <div class="mr-3"><i class="far fa-map-marker-alt"></i><span class="h6 p-2 ">{{$nota->Ciudad}}</span></div>
        <div class="mr-3"><button class="btn btn-default p-0" type="button" onclick="javascript:window.print()"><i class="fal fa-print mr-1"></i><span class="h6  ">Imprimir</span></button></div>
      </div>






      <!--Pie de la imagen-->

      <!--contenido-->
      <div class=" mt-5">

        <div id="contenido-nota">

          {!! $nota->Contenido !!}{!! $nota->Contenido2 !!}

        </div>

      </div>

      <!--ENCUESTA -->

      <!--
          <section id="encuesta" class="container mt-5 wow fadeInUp">

            <h3>¿ Te fue de interés esta noticia ?</h3>
            <h5>Regálanos un minuto por favor.</h5>
            <div class="card">
              <form class="form">


                <h5 class="text-center">Danos tu calificación:</h5>
                <div class="custom-control custom-radio form-group border-bottom ">
                  <input type="radio" checked="" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" value="{{$nota->ID}}-Definitivamente">
                  <label class="custom-control-label" for="defaultGroupExample1">Si, definitivamente</label>
                </div>
        -->
      <!-- Group of default radios - option 2 -->
      <!--
                <div class="custom-control custom-radio form-group border-bottom">
                  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" value="{{$nota->ID}}-Interesante">
                  <label class="custom-control-label" for="defaultGroupExample2">No, es poco interesante</label>
                </div>
-->
      <!-- Group of default radios - option 3 -->
      <!--
                <div class="custom-control custom-radio form-group border-bottom">
                  <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios" value="{{$nota->ID}}-Indiferente">
                  <label class="custom-control-label" for="defaultGroupExample3">Me es indiferente</label>
                </div>
                <button type="button" id="btn-encuesta" class="btn btn-primary text-white">Calificar</button>

              </form>
            </div>
          </section>
-->

      <!--FIN ENCUESTA -->

      <!--share-->
      <h4 class="mt-3"><span class="badge badge-primary">Comparte esta noticia<i class="fas fa-share-alt text-white ml-1"></i></span></h4>
      <div class="d-flex mb-2">
        <div class="mr-2">
          <div class="fb-share-button" data-href="http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}" data-layout="button_count">
          </div>
        </div>
        <div class="mr-2">
          <a style="border-radius: 3px; background: #1da1f2;" target="_blank " href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button  text-white pl-2 pr-2" data-show-count="true">Tweet</a>
        </div>
        <div class="mr-2"><a style="border-radius: 3px;" class="badge-info text-white pl-2 pr-2 bg-dark" href="mailto:?subject=Noticia&amp;body=Noticia ABC http://www.radioabcstereo.com/nota/{{$nota->ID}}_{{Str::slug($nota->Titular,'-')}}" title="Compartir por correo">
            <i class="fal fa-envelope mr-1" style="font-size: 12px;"></i><span>Email</span>
          </a></div>
      </div>

      <!--FinShare-->

      <!--fb-widget-->
      <div id="fb-root" class=""></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0"></script>
      <div class="fb-page  d-block d-md-none" data-href="https://www.facebook.com/radioabcesteli" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/radioabcesteli" class="fb-xfbml-parse-ignore">
          <a href="https://www.facebook.com/radioabcesteli">Radio ABC Stereo</a>
        </blockquote>
      </div>


      <!--end-widget-->

      <!--fin-contenido-->


      <!-- Modal -->
      <div class="modal fade" id="modalencuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLongTitle">Muchas Gracias!!</h5>

            </div>
            <div class="modal-body">
              <div class="text-center">
                <i class="fal fa-smile-beam" style="font-size: 48px; color: #dbdbdb;"></i>
              </div>
              <h5 class="text-center">Tu calificación es de mucha importancia para nosotros. </h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir aca</button>
              <a href="{{url('/')}}" class="btn btn-secondary">Ir al inicio</a>

            </div>
          </div>
        </div>
      </div>
      <!-- FIN MODAL -->

      <!--Mas Noticias -->

      <div class="d-flex mt-5 print-hidden ">
        <div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
        <div>
          <h4 class="h6 ml-2">MÁS</h4>
        </div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
        <div>
          <h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">NOTICIAS</h4>
        </div>


      </div>

      <div class="mt-3 print-hidden">




        <div class="row  mb-2 wow fadeIn" data-wow-delay="0.2s">
          @foreach($noticiasRam as $ram)



          <div class="col-12 col-sm-6 col-md-6">
            <a href="{{url('nota',$ram->ID.'_'.Str::slug($ram->Titular,'-'))}}" class="link-destacado">
              <div class="d-flex">
                <div class="position-relative">
                  <img class="img-thumbnail" style="max-width: 200px !important;" src="{{asset(''.$ram->Imagen)}}" alt="{{$ram->entrada}}">
                </div>
                <div class="align-self-center">
                  <div class="pl-2">
                    <span class=" badge badge-danger">{{$ram->Area}}</span>
                  </div>

                  <p class="pl-2">{{$ram->Titular}}</p>


                </div>
              </div>
            </a>
            <hr>
          </div>







          @endforeach
        </div>



        <div class="col-lg-3">

        </div>


      </div>



      <!-- Fin mas noticias-->



    </div>
    <!--FIN--FILA-PRINCIPAL-->

    <!--Fila-secundaria-->
    <div class="col-12 col-md-3 col-lg-3 d-none d-md-block  ">
      <div class="destacado-fixed print-hidden">
        <h5 class="font-weight-bold">TE PUEDE INTERESAR</h5>
        @foreach($destacado as $de)
        <a class="text-dark" href="{{url('nota',$de->ID.'_'.Str::slug($de->Titular,'-'))}}">
          <div class="row">

            <div class="col-6">
              <img class=" img-thumbnail" src="{{asset(''.$de->Imagen)}}" alt="Cargando..">
            </div>
            <div class="col-6">

              <h6>{{$de->Titular}}</h6>
            </div>

          </div>
        </a>
        @endforeach

        <!--fb-widget-->
        
          <div id="fb-root" class=""></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0"></script>
          <div class="fb-page " data-href="https://www.facebook.com/radioabcesteli" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/radioabcesteli" class="fb-xfbml-parse-ignore">
              <a href="https://www.facebook.com/radioabcesteli">Radio ABC Stereo</a>
            </blockquote>
          </div>
        



        <!--end-widget-->
      </div>






    </div>

    <!--fin-fila-secundaria-->


  </div>

</div>

<script>
  $(function() {
    $("#btn-encuesta").click(function(a) {
      a.preventDefault(), id = $("input[name='groupOfDefaultRadios']:checked").val(), $.ajax({
        url: "{{url('calificacion')}}",
        type: "get",
        data: {
          id: id
        },
        success: function(a) {
          $("#modalencuesta").modal("show"), $("#encuesta").css("display", "none")
        }
      })
    })
    $('iframe').addClass('embed-responsive-item').wrap("<div class='embed-responsive embed-responsive-16by9'></div>");
    $('#contenido-nota').addClass('format').children('p').addClass('format');

  });
</script>
<script>
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-86035316-1', 'auto');
  ga('send', 'pageview');
</script>


@endsection