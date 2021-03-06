@extends('layouts.master')
@section('contenido')
@if(sizeOf($transmision) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
<div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('transmision.create')}}">Agregar nuevo facebook live</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>

</div>
<table class="table table-hover ">
<thead>
<th>Nº</th>
<th>Título</th>
<th>Url</th>
<th>Acciones</th>
</thead>
<tbody>
	@foreach($transmision as $trans)
<tr>
<td>#</td>
<td>{{$trans->titulo}}</td>
<td>{{$trans->url}}</td>

<td>
 
  
<form action="{{route('transmision.destroy',$trans->id)}}" method="post">
@csrf
@method('DELETE')
<div class="btn-group">
<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger{{$trans->id}}">
                  <i class="fas fa-trash-alt" ></i>
                </button>

                <div class="modal fade" id="modal-danger{{$trans->id}}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">¿ Deseas Eliminar ?<br>{{$trans->titulo}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>El dato sera eliminado de la base de datos…</p>
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
{{$transmision->links()}}
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('transmision.create')}}">Agregar nuevo facebook live</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>
@endif
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>


@endsection