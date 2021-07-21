@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {!! Html::link('#','Agregar Usuario',array('class'=>"btn btn-primary ripple m-1 ",'style'=>'margin-bottom:40px', 'data-toggle' => 'modal', 'data-target' => '#modalAddUsuario'))!!}

            <hr>
            <h4 class="card-title">Usuarios</h4>

            <div class="table-responsive">
                <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th> Accion </th>
                            <th> Nombre</th>
                            <th> Departamento</th>
                            <th> Correo </th>
                            <th> Estatus </th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td><a href="usuarios/editar/{{ Hashids::encode($usuario->id) }}"> <i class="mdi mdi-folder"></i> </a>
                                    </td>
                                    <td>{{$usuario->nombre  }}</td>
                                    <td>{{$departamentos[$usuario->departamento ] }}</td>
                                    <td>{{$usuario->email  }}</td>
                                    <td>{{($usuario->estatus)?'Activo':'Inactivo'  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddUsuario" role="dialog" aria-labelledby="modalAddUsuario">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f5f5f5">
            <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
          <button type="button" class="close rigth " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        {!! Form::open(array('url' => 'usuarios/store','class'=>'form-horizontal','role'=>'form')) !!}

            <div class="modal-body">
                <div class="form-group row ">
                    {!! Form::label('Nombre: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-4">
                    {!! Form::text('nombre',null,array( 'class' => 'form-control', 'required')) !!}
                    </div>
                    {!! Form::label('Centro: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-2">
                    {!! Form::select('centro_id',$centros,null,array('class' => 'form-select', 'required')) !!}
                    </div>
                    {!! Form::label('Dpto: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-3">
                    {!! Form::select('departamento_id',$departamentos,null,array('class' => 'form-select', 'required')) !!}
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('Correo : ', null ,array('class'=>'ul-form_label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-5">
                    {!! Form::email('email',null,array( 'class' => 'form-control', 'required')) !!}
                    </div>
                    {!! Form::label('Contraseña:', null, array('class'=>'ul-form_label ul-form--margin col-lg-2 col-form-label')) !!}
                    <div class="col-lg-4">
                    {!! Form::text('password',null,array('class'=>'form-control','required')) !!}
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
            <button type="submit" class="btn btn-success"  id="", secure = null> <i class="fa fa-floppy-o" aria-hidden="true" ></i> Guardar</button>
          </div>
        {!! Form::close()!!}
      </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
