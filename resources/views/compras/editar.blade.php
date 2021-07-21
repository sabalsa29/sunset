@extends('layout.master')


@section('content')
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                {!! Form::open(['url'=>'compras/update','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row col-lg-3" >
                       <h4>Programacion #{{ str_pad($compra->id, 5, "0", STR_PAD_LEFT) }}</h4>
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
                    {{ Form::hidden('id', $compra->id) }}
                    <br>
                    <hr>
                    <h6>Totales</h6>
                    <div class="form-group row ">
                        {!! Form::label('Total: '. '$'.number_format($total_programacion ,2), null ,array('class'=>'ul-form__label ul-form--margin col-lg-4 col-form-label')) !!}
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('Total Pagado: '. '$'.number_format($total_programacion_pagado ,2), null ,array('class'=>'ul-form__label ul-form--margin col-lg-4 col-form-label')) !!}
                    </div>

                    <a href="/compras" title="Compras" class="btn btn-light"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
                    <button  type="submit" class="btn btn-success float-right" id="btn-save-event" > <i class="mdi mdi-content-save"></i> Guardar </button>
            {!! Form::close() !!}
          </div>
          <hr>
          <div class="card-body">
            {!! Html::link('#','Agregar Pago',array('class'=>"btn btn-primary ripple m-1 ",'style'=>'margin-bottom:40px', 'data-toggle' => 'modal', 'data-target' => '#modal_addproducto'))!!}
            <br>
                @if($cantidad>0)
                    <table class="table table-hover table-responsive">
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
                                    <td>
                                        @if ($detalle->estatus ==3)
                                        <a class="list-inline-item" href="/programacion/detalle/{{ $detalle->id }}"> <label class="badge badge-primary"><i class="mdi mdi-folder"></i></label></a>

                                        @else
                                        <a class="list-inline-item modales" data-target="#modal_add_pago" data-toggle="modal" data-id="{{ $detalle->id }}"> <label class="badge badge-warning"><i class="mdi mdi-currency-usd"></i></label></a>
                                        <a class="list-inline-item " data-target="#modal_add_pago" data-toggle="modal" data-id="{{ $detalle->id }}"> <label class="badge badge-danger"><i class="mdi mdi-delete "></i></label></a>
                                        @endif
                                    </td>
                                    <td>{{$detalle->fecha  }}</td>
                                    <td>{{$empresas[$detalle->empresa_id]  }}</td>
                                    <td>{{$detalle->proveedor->nombre  }}</td>
                                    <td>{{$detalle->no_factura  }}</td>
                                    <td>{{  '$'.number_format($detalle->total ,2)  }}</td>
                                    <td>{{$detalle->codigo  }}</td>
                                    <td>{{$detalle->producto->descripcion  }}</td>
                                    <td>{{$usuarios[$detalle->usuario_autoriza_id]  }}</td>
                                    <td>{{$detalle->viaje  }}</td>
                                    @if($detalle->estatus==1)
                                        <td>
                                            <label class="badge badge-primary">Nuevo</label>
                                        </td>
                                    @elseif($detalle->estatus==3)
                                        <td>
                                            <label class="badge badge-success">Pagado Completo</label>
                                        </td>
                                    @elseif($detalle->estatus==2)
                                    <td>
                                        <label class="badge badge-warning">En Proceso</label>
                                    </td>

                                    @endif
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
                    <!--{!! Form::label('Pagado: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-3">
                    {!! Form::text('pagado',null,array( 'class' => 'form-control', 'required')) !!}
                    </div>
                    -->
                    {!! Form::label('Total: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-1 col-form-label')) !!}
                    <div class="col-lg-3">
                    {!! Form::number('total',0,array( 'class' => 'form-control','required','min'=>'1', 'step'=>'any')) !!}
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
                    {!! Form::text('viaje',null,array( 'class' => 'form-control')) !!}
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

<div class="modal fade" id="modal_add_pago" role="dialog" aria-labelledby="modal_add_pago">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f5f5f5">
            <h4 class="modal-title" id="myModalLabel">Pagar/Abonar</h4>
          <button type="button" class="close rigth " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        {!! Form::open(array('url' => 'compras/update_detalle','class'=>'form-horizontal','role'=>'form','files' => true)) !!}

            <div class="modal-body">
                <div class="form-group row">
                    <div class="form-group row ">
                        <label class="checkbox-inline">{!! Form::checkbox('pagado', 1, false, ['id'=>'check_pagado']) !!} Pago Completo</label>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('file','Comprobante :', array('class'=>'control-label col-sm-2')) !!}
                        <div class="col-lg-8">
                            {!! Form::file('file', array( 'class' => 'form-control','placeholder' => 'Archivo', "accept"=>"application/pdf")) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                         <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group row ocultar">
                        {!! Form::label('Pago Parcial ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}

                    </div>
                    <div class="form-group row ocultar">

                        {!! Form::label('Cantidad: ', null ,array('class'=>'ul-form__label ul-form--margin col-lg-2 col-form-label')) !!}
                        <div class="col-lg-8">
                        {!! Form::text('cantidad',null,array('id'=> 'cantidad', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row ocultar">

                        {!! Form::label('file','Comprobante :', array('class'=>'control-label col-sm-2')) !!}
                        <div class="col-lg-8">
                        {!! Form::file('file_2', array( 'class' => 'form-control','placeholder' => 'Archivo', "accept"=>"application/pdf")) !!}
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                         <div class="help-block with-errors"></div>
                        </div>
                    </div>

                </div>
                {!! Form::hidden("id", null,array('id' => 'id')) !!}

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
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush
@section('script')
     <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>
    <script>
        $(".modales").on("click",function(){
            var cantidad       = $(this).data('cantidad');
            var id           = $(this).data('id');
            console.log(id);
            $(".modal-body #cantidad").val( cantidad );
            $(".modal-body #id").val( id );
        });
    </script>
      <script>
        $(function(){
            $(".ocultar").show();

            $('#check_pagado').on('click',function(){
                if( document.querySelector('#check_pagado').checked ){
                    $(".ocultar").hide();

                }else{
                    $(".ocultar").show();
                }
            });

        });


    </script>
@endsection
