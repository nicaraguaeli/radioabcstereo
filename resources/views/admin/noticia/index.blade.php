@extends('layouts.master')
@section('contenido')




@if(sizeof($noticia) > 0)
<div class="card card-primary card-outline">
<div class="card-header">
<div class="row">
 <div class="col sm-4"><a class="btn btn-block btn-secondary" href="{{route('noticia.create')}}">Crear nueva nota</a></div>
 <div class="col sm-4"></div>
 <div class="col sm-4"></div>
</div>

</div>

</div>
<table class="table table-hover ">
<thead>
<th>Nº</th>
<th>Fecha</th>
<th>Titular</th>
<th>Tipo</th>
<th>Puntos</th>
<th>Estado</th>
<th>Acciones</th>
</thead>
<tbody>
@foreach($noticia as $nota)
<tr>
<td>{{++$i}}</td>
<td>{{date('d-M-y', strtotime($nota->Ano.'-'.$nota->Mes.'-'.$nota->Dia))}}
<td>{{$nota->Titular}}</td>
<td>{{$nota->Area}}</td>
<td>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal{{$nota->ID}}">
                  Puntos
                </button>
                <div class="modal fade" id="modal{{$nota->ID}}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Puntaje</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <h6>Vistas Totales <span class="badge badge-secondary ml-1">{{$nota->Leido}}</span></h6>
             <ul id="lista{{$nota->ID}}" class="list-unstyled text-center">
               
             </ul>
            </div>
            <div class="modal-footer justify-content-between">
            <button id="v-{{$nota->ID}}"  type="button" class="btn btn-default btn-valoracion">Ver Valoración</button >
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</td>
<td>
@if($nota->Estado == 'Publicado')
<div class="form-group">
<script>
dato({{$nota->ID}});
function dato(id)
{
 $(document).ready(function()
 {
   $('#'+id).prop('checked',true);
 });
}
</script>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$nota->ID}}">
                      <label class="custom-control-label" for="{{$nota->ID}}"></label>
                    </div>
                  </div>
@else
<div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{$nota->ID}}">
                      <label class="custom-control-label" for="{{$nota->ID}}"></label>
                    </div>
                  </div>
@endif
</td>
<td>
  
<form action="{{route('noticia.destroy',$nota->ID)}}" method="post">
@csrf
@method('delete')
<div class="btn-group">
<a target="_blank" class="btn btn-block bg-gradient-info btn-sm" href="{{route('noticia.show',$nota->ID)}}"><i class="fas fa-eye"></i></a>
<a class="btn btn-block bg-gradient-warning btn-sm" href="{{route('noticia.edit',$nota->ID)}}"><i class="fas fa-edit"></i></a>
@if(Auth::user()->rol != 'admin')
  @else
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
        @endif
      </div>
</div>
</form>
</td>

</tr>
@endforeach
</tbody>
</table>
{{$noticia->links()}}
@else
@endif
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<script>
 $(document).ready(function(){const t=Swal.mixin({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3});$(".custom-control-input").change(function(){var e;this.checked?((e=$.ajax({url:"{{url('noticiaEstado')}}",method:"get",data:{idUno:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)})):((e=$.ajax({url:"{{url('noticiaEstado')}}",method:"get",data:{idCero:$(this).attr("id")}})).done(function(e){$(this).prop("checked",!0),t.fire({type:"success",title:e})}),e.fail(function(t,e){alert("Request failed: "+e)}))})
 
$(".btn-valoracion").click(function(i){i.preventDefault(),id=$(this).attr("id").split("-"),id=id[1],$("#lista"+id).append(" <div class='spinner-border m-5' role='status'><span class='sr-only'>Loading...</span></div>"),$.ajax({url:"{{url('puntaje')}}",type:"get",data:{id:id},success:function(i){$("#lista"+id).children().remove(),$.each(i,function(i,a){$("#lista"+id).append(" <li>"+a.calificacion+" <span class='badge badge-info'>"+a.cant+"</span></li>")})}})});

});

</script>


@endsection



