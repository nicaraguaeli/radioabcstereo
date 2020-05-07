@extends('layouts.master')
@section('contenido')
@if(sizeOf($videos) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('abctva.create')}}">Agregar nuevo video</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>

</div>
<table class="table table-hover ">
<thead>
<th>Nº</th>
<th>Fecha Publicacion</th>
<th>Autor</th>
<th>Imagen</th>
<th>Descripción</th>
<th>Tipo</th>
<th>Acciones</th>
</thead>
<tbody>
	@foreach($videos as $video)
<tr>
<td>#</td>
<td>{{$video->created_at}}</td>
<td>{{$video->autor}}</td>
<td><img style="width: 150px;" class="img-fluid" src="{{asset('').$video->thumbnail}}" alt=""></td>
<td>{{$video->descripcion}}</td>
<td>{{$video->tipo}}</td>
<td>
<form action="{{route('abctva.destroy',$video->id)}}" method="post">
@csrf
@method('DELETE')
<div class="btn-group">
<a class="btn btn-block bg-gradient-warning btn-sm" href="{{route('abctva.edit',$video->id)}}"><i class="fas fa-edit"></i></a>
<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger{{$video->id}}">
                  <i class="fas fa-trash-alt" ></i>
                </button>

                <div class="modal fade" id="modal-danger{{$video->id}}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">¿ Deseas Eliminar ?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>El dato sera borrado de la base de datos…</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
             <button type="submit" class="btn btn-outline-light  btn-sm">Proceder</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
{{$videos->links()}}
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('abctva.create')}}">Agregar nuevo video</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>
@endif

@endsection