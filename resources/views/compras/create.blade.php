@extends('layout.master')


@section('content')
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">

            <div class="card-body">
                {!! Form::open(['url'=>'compras/store','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Nuevo Movimiento</h4>
                    </div>

                    <br>
                    <div class="form-group row">
                        {!! Form::label('Fecha: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-2">
 					    {!! Form::date('fecha_asignacion', $fecha_hoy= new Date(), ['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::label('Proveedor: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
 					    {!! Form::select('proveedor_id', $proveedores, null, ['class'=>'form-select', 'required','placeholder'=>'Selecciona Proveedor']) !!}
                        </div>
                        {!! Form::label('Producto:', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
 					    {!! Form::select('producto_id', $productos, null, ['class'=>'form-select ', 'required','placeholder'=>'Selecciona Producto']) !!}
                        </div>

                    </div>
                    <div class="form-group row">
                        {!! Form::label('Centro: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::select('empresa_id',$empresas,null,array( 'class' => 'form-select', 'required')) !!}
                        </div>
                        {!! Form::label('Factura: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::text('factura_id',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Codigo: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::text('codigo',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('Pagado: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::text('pagado',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Total: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::text('total',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        {!! Form::label('Autoriza:', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::select('usuario_id',$usuarios,null,array( 'class' => 'form-select', 'required')) !!}
                        </div>
                        {!! Form::label('Viajes: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::text('viaje',null,array( 'class' => 'form-control', 'required')) !!}
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
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush
