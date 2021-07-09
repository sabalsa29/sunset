@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                {!! Form::open(['url'=>'proveedores/store','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Nuevo Proveedor</h4>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Nombre : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-11">
                            {!! Form::text('nombre',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Correo : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-6">
                            {!! Form::email('correo',null,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Telefono : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-4">
                            {!! Form::text('telefono',null,array( 'class' => 'form-control', 'required','placeholder' => 'Numero Contacto', 'onkeypress'=>"return validNumero(event);")) !!}
                        </div>
                    </div><div class="form-group row ">

                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Domicilio : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-11">
                            {!! Form::text('domicilio',null,array( 'class' => 'form-control', 'required')) !!}
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
@section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
@endsection
<script type="text/javascript">


    </script>
