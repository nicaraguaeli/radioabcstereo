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

@endsection