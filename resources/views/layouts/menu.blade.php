@php
$categorias = App\Categoria::all();
@endphp
<nav class="navbar navbar-expand-md sticky-top navbar-dark"  style="background-color:#0362BC">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link text-light ml-3 mr-3" href="/">INICIO</a>
        </li>
@foreach($categorias as $categoria)
@php
$subcategorias = App\Categoria::find($categoria->id)->subcategorias;
@endphp


        <li class="nav-item dropdown">


        <a class="nav-link text-light ml-3 mr-1" href="#" data-toggle="dropdown" onclick="#">
        {{$categoria->nombre}}
        <span class="dropdown-toggle ml-1 mr-3" id="navbardrop" data-toggle="dropdown"></span>
        </a>



        <div class="dropdown-menu" style="background-color:#0362BC">
            @foreach($subcategorias as $subcategoria)
                <a class="dropdown-item text-light" href="/Subcategoria/{{$subcategoria->slug}}">{{$subcategoria->nombre}}</a>
            @endforeach
        </div>
        </li>
@endforeach

@if(1 == 2)
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light ml-3 mr-3" href="#" id="navbardrop" data-toggle="dropdown">
        Productos
        </a>
        <div class="dropdown-menu" style="background-color:#0362BC">
        <a class="dropdown-item text-light" href="#">Telares</a>
        <a class="dropdown-item text-light" href="#">Cartas de Colores</a>
        <a class="dropdown-item text-light" href="#">Catalogos</a>
        </div>
        </li>
@endif



        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light ml-3 mr-3" href="#" id="navbardrop" data-toggle="dropdown">
        CONTACTO
        </a>
        <div class="dropdown-menu" style="background-color:#0362BC">
        <a class="dropdown-item text-light" href="/contacto">Enviar Email</a>
        <a class="dropdown-item text-light" href="#">La Empresa</a>
        <a class="dropdown-item text-light" href="#">Ver Mapa</a>
        </div>
        </li>


        </ul>
    </div>
</nav>