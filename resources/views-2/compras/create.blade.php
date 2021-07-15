@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                {!! Form::open(['url'=>'ComprasController@store','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Nuevo Movimiento</h4>
                    </div>
                   
                    <br>
                    <div class="form-group row">
                        {!! Form::label('Fecha: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-5">
 					    {!! Form::date('fecha_asignacion', $fecha_hoy= new Date(), ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>
                    <br>
                    <a href="/compras" title="Asignaciones" class="btn btn-light"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
                    <button  type="submit" class="btn btn-success float-right" id="btn-save-event" > <i class="mdi mdi-content-save"></i> Guardar </button>

            {!! Form::close() !!}
          </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush