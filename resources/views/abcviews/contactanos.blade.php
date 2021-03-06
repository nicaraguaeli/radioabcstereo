@extends('layouts.home')
@section('contenido')
<div class="container">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
<div class="row mt-5">
         
         <div class="col-lg-12">
             
         <div class="d-flex border-b mb-5" >
            
             <div><h4 class="h6 ml-2">ABC</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
             <div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">Contáctanos</h4></div>
             
             
         
          </div>
     
         </div>  
             
     
          </div>
     <div class="row mt-3">
         <div class="col-lg-6">
             <!--Section: Contact v.2-->
     <section class="mb-4">
     
         
         
             <h5 class="text-secondary text-left">¿Tienes alguna pregunta?</h5>
             <h5 class="text-secondary text-left">¿Deseas enviar un saludo o solicitar una canción? </h5>
             <h5 class="text-secondary text-left">¿Deseas anunciarte con nosotros?</h5>
             <h5 class="text-secondary text-left">¿Quieres comunicarte con el área de prensa?</h5>
             <h5 class="text-secondary text-left">Por favor no dudes en contactarnos a través de este formulario. <br> ¡Gracias por tu preferencia!</h5>
            
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
         <div class="row ">
     
             <!--Grid column-->
             <div class="col-md-9 mb-md-0 mb-5 mt-2">
                 <form  action="{{route('enviar')}}" method="POST">
                  @csrf
                     <!--Grid row-->
                     <div class="row">
     
                         <!--Grid column-->
                         <div class="col-md-12">
                             <div class="md-form mb-0">
                                 <input  type="text" name="nombre" class="form-control">
                                 <label for="nombre" class="">Tu nombre</label>
                             </div>
                         </div>
                         <!--Grid column-->
     
                         <!--Grid column-->
                         <div class="col-md-12">
                             <div class="md-form mb-0">
                                 <input type="email"  name="email" class="form-control">
                                 <label for="email" class="">Tu correo electrónico</label>
                             </div>
                         </div>
                         <!--Grid column-->
     
                     </div>
                     <!--Grid row-->
     
                     <!--Grid row-->
                     <div class="row">
                         <div class="col-md-12">
                             <div class="md-form mb-0">
                                 <input required type="text"  name="asunto" class="form-control">
                                 <label for="asunto" class="">Asunto</label>
                             </div>
                         </div>
                     </div>
                     <!--Grid row-->
     
                     <!--Grid row-->
                     <div class="row">
     
                         <!--Grid column-->
                         <div class="col-md-12">
     
                             <div class="md-form">
                                 <textarea required type="text"  name="mensaje" rows="2" class="form-control md-textarea"></textarea>
                                 <label for="mensaje">Tu mensaje</label>
                             </div>
     
                         </div>
                     </div>
                     <!--Grid row-->
                          <button type="submit" class="btn btn-primary">Enviar</button>
                 </form>
     
              
             </div>
             <!--Grid column-->
     
             <!--Grid column-->
             
             <!--Grid column-->
     
         </div>
     
     </section>
     
         </div>
         <div class="col-lg-6">
             <div class="embed-responsive embed-responsive-4by3">
                 <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.231163092492!2d-86.36088768566333!3d13.084530990781834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f718c41efb7d5ab%3A0x5db7d26d6f0681ce!2sRadio%20ABC%20Stereo%20Estel%C3%AD!5e0!3m2!1ses-419!2sni!4v1586896420028!5m2!1ses-419!2sni" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
             </div>
             
         </div>
     </div>
     <h5 class="h5-responsive text-center mb-3 mt-3"><span class="font-weight-bold text-primary">Números de contacto</span></h5>
     <div class="row">
     
         <div class="col-md-6">
             <h5 class="h5-responsive text-center"><span class="badge badge-dark">Cabina</span>
             </h5>
              <h6 class="text-center font-weight-bold">Teléfonos para llamadas</h6>
              <h6 class="text-center">+505 2713-3043</h6>
              <h6 class="text-center">+505 2714-2000</h6>
              <h6 class="text-center font-weight-bold">Celulares para mensajes</h6>
              <h6 class="text-center">+505 8845-0415 Claro (WhatsApp)</h6>
              <h6 class="text-center">+505 8113-2643 Tigo</h6>
     
     
     
         </div>
         <div class="col-md-6">
             <h5 class="h5-responsive text-center"><span class="badge badge-dark">Oficinas</span></h5>
             <h6 class="text-center font-weight-bold">Teléfono</h6>
             <h6 class="text-center">+505 2713-6001</h6>
             <h6 class="text-center font-weight-bold">Celular</h6>
             <h6 class="text-center">+505 8151-3977 Tigo (WhatsApp)</h6>
         </div>
     
     </div>
</div>

@endsection