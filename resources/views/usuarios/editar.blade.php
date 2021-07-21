@extends('layout.master')


@section('content')
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                {!! Form::open(['url'=>'compras/store','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Compra</h4>
                    </div>

                    <br>
                    <div class="form-group row ">
                        {!! Form::label('Fecha del: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                        <div class="col-lg-4">
                        {!! Form::date('fecha_del',$compra->fecha_del,array('id'=>'fecha', 'class' => 'form-control', 'required')) !!}
                        </div>
                        {!! Form::label('Fecha hasta: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                        <div class="col-lg-4">
                        {!! Form::date('fecha_hasta',$compra->fecha_hasta,array('id'=>'fecha', 'class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Comentarios: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                        <div class="col-lg-10">
                        {!! Form::text('comentario',$compra->comentario,array('id'=>'fecha', 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <br>
                    <a href="/compras" title="Compras" class="btn btn-light"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
                    <button  type="submit" class="btn btn-success float-right" id="btn-save-event" > <i class="mdi mdi-content-save"></i> Guardar </button>
            {!! Form::close() !!}
          </div>
          <hr>
          <div class="card-body">
            {!! Html::link('#','Agregar Pago',array('class'=>"btn btn-primary ripple m-1 ",'style'=>'margin-bottom:40px', 'data-toggle' => 'modal', 'data-target' => '#modal_addproducto'))!!}
            <br>
                @if($cantidad>0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th> Accion </th>
                            <th> Fecha</th>
                            <th> Centro </th>
                            <th> Proveedor </th>
                            <th> Factura </th>
                            <th> Total </th>
                            <th> Codigo </th>
                            <th> Descripcion </th>
                            <th> Autorizo </th>
                            <th> Viajes </th>
                            <th>Estatus</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra_detalles as $detalle)
                                <tr>
                                    <td></td>
                                    <td>{{$detalle->fecha  }}</td>
                                    <td>{{$detalle->empresa_id  }}</td>
                                    <td>{{$detalle->proveedor->nombre  }}</td>
                                    <td>{{$detalle->no_factura  }}</td>
                                    <td>{{$detalle->total  }}</td>
                                    <td>{{$detalle->codigo  }}</td>
                                    <td>{{$detalle->producto->descripcion  }}</td>
                                    <td>{{$detalle->usuario_autoriza_id  }}</td>
                                    <td>{{$detalle->viaje  }}</td>
                                    <td>{{$detalle->estatus  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_addproducto" role="dialog" aria-labelledby="modal_addproducto">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f5f5f5">
            <h4 class="modal-title" id="myModalLabel">Agregar Pago</h4>
          <button type="button" class="close rigth " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        {!! Form::open(array('url' => 'compras/store','class'=>'form-horizontal','role'=>'form')) !!}

            <div class="modal-body">
                <div class="form-group row">
                    {!! Form::label('Fecha: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-3">
                     {!! Form::date('fecha', $fecha_hoy= new Date(), ['class'=>'form-control', 'required']) !!}
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
                {{ Form::hidden('compra_id', $compra->id) }}
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
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush
@section('script')
     <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>
@endsection
