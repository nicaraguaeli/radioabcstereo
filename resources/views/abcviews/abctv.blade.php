@extends('layouts.home')
@section('contenido')



<div class="container my-5">
  <hr>



  @if(sizeOf($tipos) > 0)

  @foreach($tipos as $tipo)

  <div class="d-flex mt-5 mb-4 azul-claro p-2 rounded">

    <div>
      <h4 class="h6 ml-2 text-white m-0">SECCIÓN</h4>
    </div><i class="fas fa-caret-right ml-2 text-white" style="font-size: 17px;"></i>
    <div>
      <h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase m-0 " data-wow-delay="0.2s"><a class="text-white" href="{{url('abctvlist',$tipo->tipo)}}">{{$tipo->tipo}}</a></h4>
    </div>


  </div>



  <div class="row border-bottom">
    @foreach($videos as $video)


    @if($tipo->tipo == $video->tipo)

    <div class="col-lg-3 wow fadeIn position-relative" data-wow-delay="0.{{$i++}}s">



      <div class="card border-0  ">
        <a href="{{url('abctvsearch',$video->id.'_'.Str::slug($video->titulo,'-'))}}">
          <img src="{{$video->thumbnail}}" class="card-img-top rounded" alt="{{ $video->titulo }}" style="filter: brightness(0.8);">

          <div class="position-absolute" style="top: 25%; left: 50%;">
            <i class="fas fa-play mt-1 " style="font-size: 2rem; margin: 0 auto;"></i>
          </div>


          <div class="card-body text-white">
            <div class="row justify-content-around">
              <div class="col-xs-6">
                <h5 class="h-5 text-dark auto-height font-weight-bold">{{$video->titulo}}</h5>
              </div>
              <div class="col-xs-6 ">
                <h6 class="text-dark">{{$video->fecha}}</h6>

              </div>
            </div>


          </div>
        </a>
      </div>


    </div>

    @endif
    @endforeach

  </div>

  @endforeach

  @endif
</div>


@endsection