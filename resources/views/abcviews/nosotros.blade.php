@extends('layouts.home')
@section('contenido')
   <div class="row mt-5">
    	 
    <div class="col-lg-12">
    	
	<div class="d-flex" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">NOSOTROS</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">ABC</h4></div>
		
		
	
     </div>

    </div>	
        

	 </div>
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