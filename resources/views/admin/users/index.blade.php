@extends('layouts.master')
@section('contenido')
@if(sizeOf($users) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
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
<th>Estado de la cuenta</th>
<th>Acciones</th>
</thead>
<tbody>
	@foreach($users as $user)
<tr>
<td>#</td>
<td>{{$user->name}}</td>
<td>{{$user->rol}}</td>
<td>
  @if($user->estado == 1)
<div class="form-group">
<script>
dato({{$user->id}});
function dato(id)
{
 $(document).ready(function()
 {
   $('#'+id).prop('checked',true);
 });
}
</script>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$user->id}}">
                      <label class="custom-control-label" for="{{$user->id}}"></label>
                    </div>
                  </div>
@else
  <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$user->id}}">
                      <label class="custom-control-label" for="{{$user->id}}"></label>
                    </div>
                  </div>
                 
@endif
</td>

</tr>
@endforeach
</tbody>
</table>

@else
<p>No hay editores</p>
@endif
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<script>
 $(document).ready(function(){const t=Swal.mixin({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3});$(".custom-control-input").change(function(){var e;this.checked?((e=$.ajax({url:"{{url('userEstado')}}",method:"get",data:{idUno:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)})):((e=$.ajax({url:"{{url('userEstado')}}",method:"get",data:{idCero:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)}))})});
</script>

@endsection