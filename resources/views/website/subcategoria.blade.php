@extends('layouts.base')

@section('title', 'Categorias - ')
@section('bc1link', 'mecago')
@section('bc1text', 'mecago1')

@section('bc2text', 'mecago2')

@section('content')
@php
$categoria = App\Subcategoria::find($subcategoria->id)->categoria;
$contenidos = App\Subcategoria::find($subcategoria->id)->contenidos;
@endphp
@include('layouts.breadcrumb', ['link2' => $subcategoria, 'link1' => $categoria])
    <div class="py-3">
        <div class="container">
            @if($contenidos->count() > 0)
            @foreach($contenidos as $contenido)
                <div class="row m-5 border py-4 bg-white">
                    {{-- src="https://static.pingendo.com/cover-bubble-light.svg" --}}
                <div class="col-md-6 my-auto">
                    <img class="img-fluid d-block mx-auto"
                    @if($contenido->imagen)
                        src="/imagenes/{{ strtolower(str_replace(' ', '', $categoria->nombre)) }}/{{ strtolower(str_replace(' ', '', $subcategoria->nombre)) }}/{{ $contenido->imagen }}"
                    @else
                        src="https://static.pingendo.com/cover-bubble-light.svg"
                    @endif
                ></div>

                <div class="px-md-5 p-3 col-md-6 d-flex flex-column justify-content-center">
                    <h1>{{ $contenido->nombre }}</h1>
                    <p class="my-3 lead">{!! nl2br($contenido->descripcion) !!}</p>
                </div>
                </div>
            @endforeach
            @else
            <div class="row m-5 border py-4">
                    {{-- src="https://static.pingendo.com/cover-bubble-light.svg" --}}
                <div class="col-md-6">
                    <img class="img-fluid d-block"
                        src="https://static.pingendo.com/cover-bubble-light.svg"
                ></div>

                <div class="px-md-5 p-3 col-md-6 d-flex flex-column justify-content-center">
                    <h1>Cargando</h1>
                    <p class="my-3 lead">Descripcion</p>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection