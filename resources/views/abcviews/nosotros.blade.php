@extends('layouts.home')
@section('contenido')

@isset($nosotros)
<div class="container">
	<div class="row mt-3">
		<div class="col-lg-12">
			{!!$nosotros->contenido!!}
		</div>
	</div>
</div>

@endif
<script>
	$(function(){
        $('iframe').addClass('embed-responsive-item').wrap( "<div class='embed-responsive embed-responsive-16by9'></div>" );
	});
	
</script>
@endsection