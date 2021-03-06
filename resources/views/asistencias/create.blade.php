@extends('welcome')

@section('contentheader_title', 'Asistencia Personal')
@section('contentheader_description', 'Entrada')

@section('main-content')
<div class="col-md-12">
   
    @include('alerts.errors')
    @include('alerts.request')
    
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">

                 {!! Form::open(['route' => 'asistencias.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}

                    @include('asistencias.forms.fields')

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}
    </section>
</div>
@endsection