@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {!! Html::link('#','Agregar Programacion',array('class'=>"btn btn-primary ripple m-1 ",'style'=>'margin-bottom:40px', 'data-toggle' => 'modal', 'data-target' => '#modalAddCompra'))!!}

            <hr>
            <h4 class="card-title">Programacion de Pagos</h4>

            <div class="table-responsive">
                <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th> Accion </th>
                            <th> Fecha Del</th>
                            <th> Fecha Hasta   </th>
                            <th> Comentario </th>
                            <th> Estatus </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td></td>
                                    <td>{{$compra->fecha_del  }}</td>
                                    <td>{{$compra->fecha_hasta  }}</td>
                                    <td>{{$compra->comentario  }}</td>

                                    <td>{{$compra->estatus  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddCompra" role="dialog" aria-labelledby="modalAddCompra">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f5f5f5">
            <h4 class="modal-title" id="myModalLabel">Agregar Semana</h4>
          <button type="button" class="close rigth " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        {!! Form::open(array('url' => 'compras/store_compra','class'=>'form-horizontal','role'=>'form')) !!}

            <div class="modal-body">
                <div class="form-group row ">
                    {!! Form::label('Fecha del: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                    <div class="col-lg-4">
                    {!! Form::date('fecha_del',$fecha = Date::now(),array('id'=>'fecha', 'class' => 'form-control', 'required')) !!}
                    </div>
                    {!! Form::label('Fecha hasta: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                    <div class="col-lg-4">
                    {!! Form::date('fecha_hasta',$fecha = Date::now(),array('id'=>'fecha', 'class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group row ">
                    {!! Form::label('Comentarios: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                    <div class="col-lg-10">
                    {!! Form::text('comentario',null,array('id'=>'fecha', 'class' => 'form-control')) !!}
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
