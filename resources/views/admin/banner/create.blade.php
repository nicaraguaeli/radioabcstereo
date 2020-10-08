@extends('layouts.master')
@section('contenido')


<form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
@csrf
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Información sobre el banner
                <small>publicidad</small>
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">link(opcional)</label>
                    <div class="col-sm-12">
                      <input  name="link" type="text" class="form-control" id="inputEmail3" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                        <label>Posicion</label>
                        <select required class="form-control" name="posicion">
                        
                       
                          <option value="Header">Header |Ancho: 1080px Alto: 200px</option>
                           <option value="Aside">Aside |Ancho: 300px Alto:600px</option>
                            
                       
          
                          
                        </select>
                      </div>
                    </div>
                  </div>
                
                   

                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                  <label for="">Imagen  </label> <small>Recorte la imagen segun la posicion que selecciono </small>
                    <div class="custom-file">                 
                      <input  accept="image/png, image/jpeg" required name="imagen" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Imagen</label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col-sm-12">
                    <div class="form-group">
                  <label>Expiración</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input required type="date" name="expiracion" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>
                   </div>
                </div>
                </div>
                 <div class="row justify-items-between">
                  
                   <div class="col-lg-6 form-group"> <a href="{{url('admin')}}" type="submit" class="btn btn-info">Cancelar</a></div>
                    <div class="col-lg-6 form-group"> <button type="submit" class="btn btn-primary">Crear</button></div>
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