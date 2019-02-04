@extends('admin.layouts.base')

@section('title', 'Listar Imagenes - ')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listar Imagenes</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/admin/">Inicio</a></li>
                            <li class="active">Listar Imagenes</li>
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
                                <strong class="card-title">Lista de Imagenes</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Imagen</th>
                                            <th>Resumen</th>
                                            <th>Descripcion</th>
                                            <th>Botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imagenes as $imagen)
                                        <tr>
                                            <td>{{$imagen->id}}</td>
                                            <td>{{$imagen->nombre}}</td>
                                            <td>
                                                <img 
                                                src="/imagenes/{{ $imagen->imagen }}" 
                                                style=" max-height: 100px; max-width: 100px" class="img-fluid" alt="">
                                            </td>
                                            <td>{{$imagen->resumen}}</td>
                                            <td>{{$imagen->descripcion}}</td>
                                            <td>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="/admin/imagenes/{{$imagen->id}}/edit" class="btn btn-warning input-group-addon">Editar</a>
                                            </div>
                                            
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                {!! Form::open(['route' => ['imagenes.destroy', $imagen->id], 'method' => 'DELETE' ])!!}
                                                    {!! Form::button('Eliminar', ['class' => 'btn btn-danger input-group-addon' , 'data-toggle' => 'modal' , 'data-target' => '#Modal'.$imagen->id ])!!}
                                                    <div class="modal fade" id="Modal{{$imagen->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabell{{$imagen->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabell{{$imagen->id}}">Ventana de Confirmación</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            Esta seguro que desea eliminar el Contenido: {{$imagen->nombre}} ?
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
            "pagingType": "full_numbers",
            "order": [[ 0, "desc" ]]
        });
    } );
    </script>
@endsection