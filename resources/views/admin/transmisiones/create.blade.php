@extends('layouts.master')
@section('contenido')


<form action="{{route('transmision.store')}}" method="post" enctype="multipart/form-data">
@csrf
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Información de la transmisión
                <small>abctv</small>
              </h3>
              <!-- tools box -->
             
                   
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="container">
           
                
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Url de la transmisión</label>
                    <div class="col-sm-12">
                      <input required name="url" type="text" class="form-control" id="inputEmail3" placeholder="Url">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-12">
                      <input required name="titulo" type="text" class="form-control" id="inputEmail3" placeholder="Titulo">
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
     
      

@endsection