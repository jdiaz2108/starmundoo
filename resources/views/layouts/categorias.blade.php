@php
$categorias = App\Categoria::all();
@endphp
<div class="container-fluid bg-light py-4">
	<div class="container">
		<div class="row justify-content-around">
			@foreach($categorias as $categoria)
				<div class="media col-12 col-md-5 border p-3 shadow-sm my-4 bg-white">
					<img src="/imagenes/categorias/{{$categoria->imagen}}" alt="John Doe" class="img-fluid col-6">
					<div class="media-body col-6">
						<h4 class="text-center text-danger font-weight-bold p-1 p-md-3 order-1 order-md-2">{{$categoria->nombre}}</h4>
						<p>Tejidos y Tranzados</p>
						<div class="mx-auto">
						<a href="/{{$categoria->slug}}" class="btn btn-lg btn-secondary text-center mx-auto">Enviar</a> 
						</div>  
					</div>
				</div>
			@endforeach
  </div>
	</div>
</div>