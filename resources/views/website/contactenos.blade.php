@extends('layouts.base')

@section('title', 'Contactenos - ')

@section('content')
@include('layouts.breadcrumb', ['link2' => 'contactenos', 'link1' => null])
<div class="container-fluid py-5">
  <div class="container">
    @if(Session('success'))
    <div class="alert alert-info alert-dismissible fade show mb-5 p-3" role="alert">
      <h4 class="alert-heading">Contacto enviado!</h4>
      <p>Muchas gracias por tenernos en cuenta, contestaremos en la mayor brevedad proble.</p>
      </div>
    @endif
    <form method="POST" action="/contacto">
      @csrf
      <div class="form-row justify-content-around border px-3 py-5 rounded shadow-sm bg-white">
        <div class="col-12 pb-5">
          <h3 class="text-center">
            Contactenos
          </h3>
          <hr class="w-25 bg-primary">
        </div>
        <div class="col-12 col-md-5 col-lg-5">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
          </div>
          <div class="form-group">
            <label for="asunto">Asunto</label>
            <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required>
          </div>
          <div class="form-group">
            <label for="email">Email de Contacto</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" required>
          </div>
        </div>

        <div class="col-12 col-md-5 col-lg-5">
          <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="8" style="resize: none" required></textarea>
          </div>
        </div>
        <div class="col-11 text-lg-right text-md-right text-center">
        <button type="submit" class="btn btn-primary mx-auto">Enviar Mensaje</button>
      </div>
      </div>
    </form>
  </div>
</div>
<div>
@endsection