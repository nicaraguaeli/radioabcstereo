@extends('layouts.home')
@section('contenido')

<div class="container mt-5">
<br class="mt-5 mt-md-0 mt-lg-0">
  <br class="mt-5 mt-md-0 mt-lg-0">
	<div class="d-flex ">
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div>
			<h4 class="h6 ml-2">NOTICIAS</h4>
		</div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div>
			<h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">@if($tipo == 'local')
				locales
				@endif
				@if($tipo == 'departamental')
				departamentales
				@endif
				@if($tipo == 'nacional')
				nacionales
				@endif
				@if($tipo == 'internacional')
				internacionales
				@endif


			</h4>
		</div>

	</div>


</div>




<div class="container">

	<div class="row mt-3">
		<div class="col-lg-9">
			<div class="row">

				@foreach($global as $global_nota)
				<div class="col-md-6">
					@include('layouts.partial.nota')
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-lg-3  border-left gris">
			<div class="row destacado-fixed">
				<div class="col-sm-12">

					<p class="text-center font-weight-bold text-white azul-medio ">TE PUEDE INTERESAR</p>


					@foreach($destacado as $de)
					<a class="link-destacado" href="{{url('nota',$de->ID.'_'.Str::slug($de->Titular,'-'))}}">
						<div class="row ">

							<div class="col-3 col-sm-3 col-md-3 align-self-center overflow-hidden">
								<div>
									<img width="90px;" class="pl-1 pr-1" src="{{asset(''.$de->Imagen)}}" alt="Cargando.." title="{{$de->Titular}}">
								</div>
							</div>
							<div class="col-9 col-sm-9 col-md-9 align-self-center">
								<p class="mt-0 mb-1 format h6 pl-1">{{$de->Titular}}</p>
							</div>


						</div>
					</a>
					<hr>
					@endforeach

					@foreach($banner as $banner)
					@if($banner->posicion == 'aside' && $banner->link == "")
					<img class="img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">
					@elseif($banner->posicion == 'aside' && $banner->link != "")
					<a href="{{$banner->link}}">
						<img class="img-fluid" src="{{asset(''.$banner->imagen)}}" alt="">

					</a>
					@endif
					@endforeach



				</div>
			</div>

		</div>

	</div>
	<div class="mt-2">
	{{$global->links()}}
</div>


</div>








@endsection