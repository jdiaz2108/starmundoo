@extends('admin.layouts.base')

@section('title', 'Listar Videos - ')

@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listar Videos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/admin/">Inicio</a></li>
                            <li class="active">Listar Videos</li>
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
                                <strong class="card-title">Lista de Videos</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Link</th>
                                            <th>Botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videos as $video)
                                        <tr>
                                            <td>{{$video->id}}</td>
                                            <td>{{$video->nombre}}</td>
                                            <td>{{$video->link}}</td>
                                            <td>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="/admin/videos/{{$video->id}}/edit" class="btn btn-warning input-group-addon">Editar</a>
                                            </div>
                                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'DELETE' ])!!}
                                                    {!! Form::button('Eliminar', ['class' => 'btn btn-danger input-group-addon' , 'data-toggle' => 'modal' , 'data-target' => '#Modal'.$video->id ])!!}
                                                    <div class="modal fade" id="Modal{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabell{{$video->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabell{{$video->id}}">Ventana de Confirmación</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            Esta seguro que desea eliminar el Contenido: {{$video->nombre}} ?
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