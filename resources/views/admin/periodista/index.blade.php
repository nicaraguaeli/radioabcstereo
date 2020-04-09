@extends('layouts.master')
@section('contenido')
@if(sizeOf($periodistas) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
<div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('periodista.create')}}">Agregar Periodista</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>

</div>
<table class="table table-hover ">
<thead>
<th>Nº</th>
<th>Nombre</th>
<th>Tipo</th>
<th>Imagen</th>
<th>Estado</th>
<th>Acciones</th>
</thead>
<tbody>
	@foreach($periodistas as $periodista)
<tr>
<td>#</td>
<td>{{$periodista->nombre}}</td>
<td>{{$periodista->tipo}}</td>
<td><img width="28px" src="{{asset(''.$periodista->imagen)}}" alt="..." class="rounded-circle"></td>
<td>
  @if($periodista->estado == 1)
<div class="form-group">
<script>
dato({{$periodista->id}});
function dato(id)
{
 $(document).ready(function()
 {
   $('#'+id).prop('checked',true);
 });
}
</script>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$periodista->id}}">
                      <label class="custom-control-label" for="{{$periodista->id}}"></label>
                    </div>
                  </div>
@else
<div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$periodista->id}}">
                      <label class="custom-control-label" for="{{$periodista->id}}"></label>
                    </div>
                  </div>
@endif
</td>
<td>
 
  
<form action="{{route('periodista.destroy',$periodista->id)}}" method="post">
@csrf
@method('DELETE')
<div class="btn-group">
<a class="btn btn-block bg-gradient-warning btn-sm" href="{{route('periodista.edit',$periodista->id)}}"><i class="fas fa-edit"></i></a>
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
{{$periodistas->links()}}
@else
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('periodista.create')}}">Agregar nuevo periodista</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>
@endif
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<script>
 $(document).ready(function(){const t=Swal.mixin({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3});$(".custom-control-input").change(function(){var e;this.checked?((e=$.ajax({url:"{{url('periodistaEstado')}}",method:"get",data:{idUno:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)})):((e=$.ajax({url:"{{url('periodistaEstado')}}",method:"get",data:{idCero:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)}))})});
</script>

@endsection