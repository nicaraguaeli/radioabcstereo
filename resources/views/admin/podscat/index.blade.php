@extends('layouts.master')
@section('contenido')
@if(sizeOf($podscat) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('podscat.create')}}">Agregar podscat</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>

</div>
<table class="table table-hover ">
<thead>
<th>Nº</th>
<th>Fecha Publicacion</th>
<th>Titulo</th>
<th>Url</th>
<th>Acciones</th>
</thead>
<tbody>
	@foreach($podscat as $pod)
<tr>
<td>#</td>
<td>{{$pod->created_at}}</td>
<td>{{$pod->titulo}}</td>
<td>{{$pod->url}}</td>
<td>
<form action="{{route('podscat.destroy',$pod->id)}}" method="post">
@csrf
@method('DELETE')
<div class="btn-group">

<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger">
                  <i class="fas fa-trash-alt" ></i>
                </button>

                <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
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
{{$podscat->links()}}
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('podscat.create')}}">Agregar nuevo podscat</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>
@endif

@endsection