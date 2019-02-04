@extends('admin.layouts.base')

@section('title', 'Listar Clientes - ')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listar Contenidos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/admin/">Inicio</a></li>
                            <li class="active">Listar Contenidos</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Contenidos</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Imagen</th>
                                            <th>SubCategoria</th>
                                            <th>Resumen</th>
                                            <th>Descripcion</th>
                                            <th>Botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contenidos as $contenido)
                                        <tr>
                                            <td>{{$contenido->nombre}}</td>

                                            <td>
                                                <img 
                                                src="/imagenes/contenidos/{{ $contenido->imagen }}" 
                                                style=" max-height: 100px; max-width: 100px" class="img-fluid" alt="">
                                            </td>
                                            <td>{{$contenido->subcategoria->nombre}}</td>
                                            <td>{{$contenido->resumen}}</td>
                                            <td>{{$contenido->descripcion}}</td>
                                            <td>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="/admin/contenidos/{{$contenido->slug}}/edit" class="btn btn-warning input-group-addon">Editar</a>
                                            </div>
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                {!! Form::open(['route' => ['contenidos.destroy', $contenido->slug], 'method' => 'DELETE' ])!!}
                                                    {!! Form::button('Eliminar', ['class' => 'btn btn-danger input-group-addon' , 'data-toggle' => 'modal' , 'data-target' => '#Modal'.$contenido->id ])!!}
                                                    <div class="modal fade" id="Modal{{$contenido->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabell{{$contenido->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabell{{$contenido->id}}">Ventana de Confirmación</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            Esta seguro que desea eliminar el Contenido: {{$contenido->nombre}} ?
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                            {!! Form::submit('Eliminar Contenido', ['class' => 'btn btn-danger'])!!}
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
        @endsection
        @section('script')
<script>
    $(document).ready( function () {

        $('#table_id').DataTable({
            "pagingType": "full_numbers"
        });
    } );
    </script>
@endsection