@php
$contactos = App\Redes::where('contacto', 1)->where('redes', null)->get();
@endphp
<div class="container-fluid"  style="background-color:#0362BC"><div class="container py-4">
<div class="row justify-content-center">


<div class="col-12 col-lg-5 col-md-10 p-3 pl-5 text-white">
<div class="text-center">
<img src="/imagenes/png/logo-starmundo.png" class="w-75 h-auto mt-2 mb-4" />
</div>


@foreach($contactos as $contacto)
	<div>
		@if($contacto->imagen)
			<img src="/imagenes/iconos/{{$contacto->imagen}}" width="20" height="25" class="my-2 mx-4" />
		@endif
		{{$contacto->descripcion}}
	</div>
@endforeach

</div>

<div class="col-12 col-lg-7 col-md-12 text-center">
<iframe src="https://www.google.com/maps/d/embed?mid=1HrfYniOA-p2oryDe3R-wia8WPvc61OAv" class="w-100" height="400px"></iframe>
</div>
</div>
</div>
</div>