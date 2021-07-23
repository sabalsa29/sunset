@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                {!! Form::open(['url'=>'proveedores/update','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-6" >
                       <h4>Editando Proveedor: {{ $proveedor->nombre }}</h4>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Nombre : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-11">
                            {!! Form::text('nombre',$proveedor->nombre,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Correo : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-6">
                            {!! Form::email('correo',$proveedor->email,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Telefono : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-4">
                            {!! Form::text('telefono',$proveedor->telefono,array( 'class' => 'form-control', 'required','placeholder' => 'Numero Contacto', 'onkeypress'=>"return validNumero(event);")) !!}
                        </div>
                    </div><div class="form-group row ">

                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Domicilio : ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-11">
                            {!! Form::text('domicilio',$proveedor->domicilio,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    {{ Form::hidden('id', $proveedor->id) }}
                    <br>
                    <a href="/proveedores" title="Proveedores" class="btn btn-light"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
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
