@extends('layouts.master')
@section('contenido')


<form action="{{route('periodista.update',$periodista->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Información del Periodista
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre completo</label>
                    <div class="col-sm-12">
                      <input value="{{$periodista->nombre}}" required name="nombre" type="text" class="form-control" id="inputEmail3" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                        <label>Tipo</label>
                        <select required class="form-control" name="tipo">
                       
                          <option value="{{$periodista->tipo}}">{{$periodista->tipo}}</option>
                          <option value="Periodista">Periodista</option>
                           <option value="Colaborador">Colaborador</option>
                            <option value="Redacción Digial ABC">Redacción Digial ABC</option>
                       
          
                          
                        </select>
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-sm-6">
                      
                      <img width="28px" src="{{asset(''.$periodista->imagen)}}" alt="..." class="rounded-circle">

                    </div>
                  </div>

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Actualizar Imagen (opcional) </label>
                    <div class="custom-file">                 
                      <input  accept="image/png, image/jpeg"  name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen</label>
                    </div>
                  </div>
                  </div>
                </div>
               
                </div>
                 <div class="row justify-items-between">
                  
                   <div class="col-lg-6 form-group"> <a href="{{url('admin')}}" type="submit" class="btn btn-info">Cancelar</a></div>
                    <div class="col-lg-6 form-group"> <button type="submit" class="btn btn-primary">Actualizar</button></div>
                 </div>
                </div>
           
          </div>
              
        </form>
        <!-- /.col-->
      </div>
     
       <script>
         $(document).ready(function(){
          bsCustomFileInput.init();
        });
       </script>

@endsection