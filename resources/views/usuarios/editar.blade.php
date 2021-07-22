@extends('layout.master')


@section('content')
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                {!! Form::open(['url'=>'usuarios/update','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Usuarios</h4>
                    </div>

                    <br>
                    <div class="form-group row ">
                        {!! Form::label('Nombre: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-4">
                        {!! Form::text('nombre',$usuario->nombre,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Centro: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-2">
                        {!! Form::select('centro',$centros,$usuario->centro,array('class' => 'form-select', 'required')) !!}
                        </div>
                        {!! Form::label('Dpto: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-3">
                        {!! Form::select('departamento',$departamentos,$usuario->departamento,array('class' => 'form-select', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Correo : ', null ,array('class'=>'ul-form_label ul-form--margin col-lg-1 col-form-label')) !!}
                        <div class="col-lg-5">
                        {!! Form::email('email',$usuario->email,array( 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Contraseña:', null, array('class'=>'ul-form_label ul-form--margin col-lg-2 col-form-label')) !!}
                        <div class="col-lg-4">
                        {!! Form::text('password',null,array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    {{ Form::hidden('id', $usuario->id) }}

                    <br>
                    <a href="/usuarios" title="Compras" class="btn btn-light"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
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
@section('script')
     <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>
@endsection
