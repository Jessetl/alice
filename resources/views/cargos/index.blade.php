@extends('welcome')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Cargo" onclick="window.location.href = '{{ URL::to('cargos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cargos</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nombre(s)</th>
                                <th>Área</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cargo as $cargo)
                                <tr>
                                    <td>{{ $cargo->nombre}}</td>
                                    <td>{{ $cargo->area->nombre}}</td>
                                    <td style="text-align: center; width: 150px;">
                                        @if($cargo->nombre!="DOCENTE DE PLANTA" AND $cargo->nombre!="DOCENTE ROTATIVO")
                                            <a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-primary btn-flat"><i class="icon-refresh icon-white"></i></a>
                                            <a class="btn btn-danger btn-flat" onclick="codigo({{ $cargo->id }})" data-toggle="modal" data-target="#myModal"> <i class="icon-trash icon-white"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ELIMINAR CARGO</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este cargo en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['cargos.destroy', 0133], 'method' => 'DELETE']) !!}
                    {{ csrf_field() }}
                    <input type="hidden" id="cargo" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function codigo(cargo){
            $('#cargo').val(cargo);
        }

    </script>
@endsection