@extends('admin.layouts.base')

@section('title', 'Contenido SubCategorias - ')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Contenidos SubCategorias</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/admin/">Inicio</a></li>
                            <li class="active">Contenidos SubCategorias</li>
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
                        <strong>Contenidos</strong> SubCategorias
                    </div>
                    <div class="card-body card-block">
                        {!! Form::model($subcategoria, ['route' => ['subcategorias.update', $subcategoria], 'method' => 'PUT', 'files' => 'true' , 'class' => 'form-horizontal']) !!}                             
                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('nombre', 'Nombre Subcategoria:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('nombre', null , ['class' => 'form-control' , 'required' => 'required', 'placeholder' => 'Nombre del Subcategoria.']) !!}
                                    <small class="form-text text-muted">Requerido.</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('imagen', 'Subir Imagen:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::file('imagen', ['class' => 'form-control-file' , 'placeholder' => 'Nombre del Subcategoria.']) !!}
                                    <small class="form-text text-muted">No Requerido. Imagen actual: {{$subcategoria->imagen}}</small>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">{!! Form::label('categoria_id', 'Seleccionar Categoria:' , ['class' => 'form-control-label']) !!}</div>
                                <div class="col-12 col-md-9">
                                    {!! Form::select('categoria_id', $categorias, null, 
                                    ['class' => 'form-control' , 'required' => 'required', 'placeholder' => 'Adicionar a Categoria...']) !!}
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
                                    {!! Form::submit('Editar', ['class' => 'btn btn-lg btn-warning']) !!}
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