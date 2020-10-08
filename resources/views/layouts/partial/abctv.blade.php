<section class="gris pb-5">

	<div class="container ">
		<div class="row py-sm-5">
			<div class="col-lg-6 ">
				<a href="{{url('abctv')}}">
					<div class="d-flex border-bottom mt-5 text-white azul-claro rounded">
						<div class="tag ml-1 mt-1" style="background-color: #e8e8e8; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
						<h5 class="h5 font-weight-bold ml-2 mt-1 wow fadeInUp" data-wow-delay="0.2s">ABCtv</h5>
					</div>
				</a>
				@isset($abctvdes)
				<div id="card-content ">

					<div class="card border-0 wow fadeInUp bg-transparent">
						<div class="embed-responsive embed-responsive-16by9 youtube-video" style=" background-color: black;">

							{!!$abctvdes->frame!!}




						</div>

						<div class="card-body ">
							<div class="row justify-content-between">
								<div class="col-xs-6">
									<p class="card-text wow bounceInLeft"><a class="text-dark h4 font-weight-bold" href="{{url('abctvsearch',$abctvdes->id.'_'.Str::slug($abctvdes->titulo,'-'))}}">{{$abctvdes->titulo}}</a></p>
								</div>
								

							</div>
							<div class="d-flex justify-content-between text-muted">
								<div><i class="fad fa-id-card mr-1"></i>{{$abctvdes->autor}}</div>
								<div><i class="fal fa-clock mr-1"></i>Publicado el: {{date('d-m-Y',strtotime($abctvdes->created_at))}}</div>
							</div>
						</div>
					</div>



				</div>
				@endif

			</div>

			<div class="col-lg-6 overflow-hidden pr-md-0">

				<a href="{{url('abc/podcast')}}">
					<div class="d-flex border-bottom mt-5 text-white azul-claro rounded">
						<div class="tag ml-1 mt-1" style="background-color: #e8e8e8; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>

						<h5 class="h5 font-weight-bold ml-2 mt-1 wow fadeInUp" data-wow-delay="0.2s">Podcast</h5>
					</div>
				</a>
				<div class="row ">
					<div class="col-md-12 ">
						<div id="app" class="template-back">

							<play-component :podcast="{{ $podcast }}"></play-component>

						</div>
					</div>

					<div class="col-md-12 mt-3 wow fadeIn">
						<a href="{{url('transmisiones')}}">
							<div class="d-flex border-bottom  text-white azul-claro rounded">
								<div class="tag ml-1 mt-1" style="background-color: #e8e8e8; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>

								<h5 class="h5 font-weight-bold ml-2 mt-1 wow fadeInUp" data-wow-delay="0.2s">Facebook live</h5>
							</div>
						</a>
						<div class="row">

							@foreach($transmision as $transmision)
							<div class=" col-12 col-sm-12 col-md-6 col-lg-6 pr-md-0 " >
								<div class="embed-responsive embed-responsive-16by9 mb-2 " >
									{!! $transmision->video !!}

								</div>
							</div>
							@endforeach
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="app">

		<example-component></example-component>

	</div>


</section>