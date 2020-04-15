@extends('layouts.home')
@section('contenido')
<div class="row mt-3">
	<div class="col-lg-6">
		<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contáctanos</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">¿Tiene usted alguna pregunta? Por favor no dude en contactarnos directamente. Nuestro equipo se pondrá en contacto con usted en cuestión de horas para ayudarlo.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Tú nombre</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Tú correo electrónico</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Asunto</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Tú mensaje</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Enviar</a>
            </div>
            <div class="status"></div>
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
<h5 class="h5-responsive text-center mb-3 mt-3"><span class="font-weight-bold">Números de contacto</span></h5>
<div class="row">

	<div class="col-md-4"><h5 class="h5-responsive text-center"><span class="badge badge-dark">Cabina</span><br>+505 2713-3043 <br>+505 2714-2000</h5></div>
	<div class="col-md-4"><h5 class="h5-responsive text-center"><span class="badge badge-dark"><i class="fab fa-whatsapp mr-1" style="font-size: 20px;"></i>Whatsapp</span><br>+505 8845-0415 Claro  <br>+505 8113-2643 Movistar</h5></div>
	<div class="col-md-4"><h5 class="h5-responsive text-center"><span class="badge badge-dark">Administración</span><br>+505 2713-6001</h5></div>
</div>
@endsection