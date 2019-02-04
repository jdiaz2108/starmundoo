@extends('admin.layouts.base')

@section('title', 'Contenido Crear - ')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Imagenes Crear</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/admin/">Inicio</a></li>
                            <li class="active">Imagenes Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Imagenes</strong> Crear
                    </div>
                    <div class="card-body card-block">
                        {!! Form::open(['route' => 'imagenes.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal']) !!}                               
                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('nombre', 'Nombre Imagen:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('nombre', null , ['class' => 'form-control' , 'placeholder' => 'Nombre de la Imagen Temporal.']) !!}
                                    <small class="form-text text-muted">No Requerido.</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('imagen', 'Subir Imagen:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::file('imagen', ['class' => 'form-control-file' , 'placeholder' => 'Imagen temporada.' , 'required' => 'required']) !!}
                                    <small class="form-text text-muted">Requerido.</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('resumen', 'Resumen:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::textarea('resumen', null , ['class' => 'form-control' , 'placeholder' => 'Resumen', 'rows' => 2]) !!}
                                    <small class="form-text text-muted">No Requerido.</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('descripcion', 'Descripcion:' , ['class' => 'form-control-label']) !!}</div>
                                 <div class="col-12 col-md-9">
                                    {!! Form::textarea('descripcion', null , ['class' => 'form-control', 'placeholder' => 'Descripcion', 'rows' => 5]) !!}
                                    <small class="form-text text-muted">No Requerido.</small>
                                </div>
                            </div>

                            <hr class="w-75 text-center py-3">

                            <div class="row form-group">
                                <div class="col col-md-3"></div>
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    {!! Form::submit('Crear', ['class' => 'btn btn-lg btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="card-footer">
                        <div class="p-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection