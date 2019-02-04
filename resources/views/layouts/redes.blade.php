@php
$redesycontacto = App\Redes::where('redes', 1)->where('contacto', 1)->get();
$redes = App\Redes::where('redes', 1)->where('contacto', null)->get();
@endphp
<div class="container-fluid" style="background-color:#D2D5D3">
	<div class=	"row justify-content-md-center">
    	<div class="col-12 col-lg-3 text-center col-md-4">
@foreach($redesycontacto as $redycontacto)
          @if($redycontacto->link)  <a href="{{$redycontacto->link}}" target="_blank"> @endif
                <img src="/imagenes/png/{{$redycontacto->imagen}}" width="40" height="40" border="0" class="m-2" />
           @if($redycontacto->link)  <a> @endif
@endforeach
<img src="/imagenes/png/mapa-starmundo.png" width="40" height="40" class="m-2" />
        </div>
        <div class="col-lg-3 col-md-1">
        </div>
        <div class="col-12 col-lg-4 text-center col-md-5">
@foreach($redes as $red)
          @if($red->link)  <a href="{{$red->link}}" target="_blank"> @endif
                <img src="/imagenes/png/{{$red->imagen}}" width="40" height="40" border="0" class="m-2" />
           @if($red->link)  <a> @endif
@endforeach
        </div>
    </div>
</div>