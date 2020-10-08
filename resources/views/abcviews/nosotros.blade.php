@extends('layouts.home')
@section('contenido')
<div class="container mt-5">
	<br class="mt-5 mt-md-0 mt-lg-0">
	<br class="mt-5 mt-md-0 mt-lg-0">
	<h1 class="font-weight-bold text-uppercase text-center " style="color: #005c92;">¡99.7: en las mejores calificaciones!</h1>
	<div class="row mt-5">
          
		<div class="col-12 col-md-6 align-self-center shadow">

		<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fradioabcesteli%2Fvideos%2F1364415490257668%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>

		</div>
		<div class="col-12 col-md-6">
		
			<p>
			Radio ABC Stereo es una emisora de referencia en la zona norte de Nicaragua, caracterizada por su objetividad, pluralidad y cercanía con la comunidad. Después de su fundación, en Julio de 1996, se ha convertido en una marca seria y de confianza, llegando a miles de personas de diferentes sectores que la posicionan en los primeros lugares de preferencia.

Tiene una parrilla de programación que combina: noticias, radio-revistas, programas musicales y de entretenimiento, a fin de satisfacer a las audiencias de las diferentes edades. Transmite las 24 horas, todos los días, con una parrilla comercial de 04:30am a 09:00pm.

Parte de la idea de que la radio y la audiencia son una familia, permitiendo que los oyentes confíen en el medio, sus programas, noticias y clientes.

Sus locutores son voces conocidas con más de 10 años de formar parte de la emisora, utilizando un lenguaje sencillo, respetuoso y dinámico que permite una relación más fluida y directa con los radioescuchas.  


Cuenta con programas de participación, consultas y respuestas, concursos y dinámicas de gran aceptación.


			</p>
		</div>


	</div>

	  <div class="row">
		  <div class="col-12 col-md-4 align-self-center">
		  <div class="h2 font-weight-bold text-center " style="color: #005c92;"><i class="fas fa-broadcast-tower"></i> COBERTURA</div>
		  <small >Radio ABC Stereo transmite en dos frecuencias 99.7FM y 102.1FM, para la zona norte y occidente de Nicaragua. Los siguientes son los departamentos de su cobertura:</small>
 <ul class="pt-2">
	 <li class="border-bottom">Estelí</li>
	 <li class="border-bottom">Madriz</li>
	 <li class="border-bottom">Nueva Segovia</li>
	 <li class="border-bottom">Jinotega</li>
	 <li class="border-bottom">Matagalpa</li>
	 <li class="border-bottom">León (municipios del norte)</li>
	 <li class="border-bottom">Chinandega (municipios del norte) </li>
 </ul>
		  </div>
		  <div class="col-12 col-md-8 "> 
		  <div class="text-center">
		<img src="{{asset('img/map.jpg')}}" alt="" class="img-fluid ">
	</div>
		  </div>
	  </div>
	<script>
		$(function() {
			$('iframe').addClass('embed-responsive-item').wrap("<div class='embed-responsive embed-responsive-16by9'></div>");
		});
	</script>
</div>
@endsection