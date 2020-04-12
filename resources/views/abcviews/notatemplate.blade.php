@extends('layouts.home')
@section('contenido')
    

    <div class="mt-2"></div>
    <div class="row mt-5">
    <div class="col-lg-12">
    	 
	<div class="d-flex" >
		<div class="tag " style="background-color: blue; width: 14px; height: 14px; border-right: 3px solid red; transform: translateY(3px); "></div>
		<div><h4 class="h6 ml-2">NOTICIAS</h4></div><i class="fas fa-caret-right ml-2" style="font-size: 17px;"></i>
		<div><h4 class="h6 font-weight-bold  ml-2 wow fadeInUp text-uppercase" data-wow-delay="0.2s">@if($tipo == 'local')
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


							</h4></div>
		
		
	
     </div>
    </div>	
        

	 </div>
	

<div class="row mt-3">
	
	@foreach($global as $global)
	<div class="col-lg-3">
		@include('layouts.partial.nota')
	</div>
	@endforeach
</div>



<div class="mt-2">
	
</div>
 


@endsection