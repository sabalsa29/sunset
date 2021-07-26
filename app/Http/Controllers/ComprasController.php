<?php

namespace App\Http\Controllers;

use App\Models\Compras_detalles;
use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
use App\Models\Compras;
use App\Models\Pagos;
//use Hashids\Hashids;
//use Hashids;
use Vinkla\Hashids\Facades\Hashids;
use Date;
use Auth;

class ComprasController extends Controller
{
    public function index(){
        //dd('llegaste');
        $compras    = Compras::where('estatus',1)->get();

        return view('compras.index', compact('compras'));
    }

    public function create(){
        $proveedores    = Proveedores::where('estatus',1)->pluck('nombre','id');
        $productos      = Productos::where('estatus',1)->pluck('descripcion','id');
        $empresas   =[
            1=> 'Saladita',
            2=> 'Escuinapan'
        ];
        $usuarios   =[
            1=> 'Adolfo R',
            2=> 'Frank Cruz'
        ];

        return view('compras.create', compact('proveedores','productos','empresas','usuarios'));
    }

    public function store(Request $req){
        //dd($req->all());
        $compra_detalle = new Compras_detalles();
        $compra_detalle->compra_id      = $req->compra_id;
        $compra_detalle->proveedor_id   = $req->proveedor_id;
        $compra_detalle->fecha          = $req->fecha;
        $compra_detalle->no_factura     = $req->factura_id;
        $compra_detalle->pagado         = $req->pagado;
        $compra_detalle->total          = $req->total;
        $compra_detalle->codigo         = $req->codigo;
        $compra_detalle->producto_id    = $req->producto_id;
        $compra_detalle->usuario_autoriza_id = $req->usuario_id;
        $compra_detalle->viaje          = $req->viaje;
        $compra_detalle->save();

        $compra         = Compras::find($req->compra_id);
        $total_compra   = Compras_detalles::where('compra_id', $compra->id)->sum('total');
        $compra->total  = $total_compra;
        $compra->save();

        Alert::success('Movimiento', 'Agregado Correctamente');
        return redirect()->back();

    }
    public function store_compra(Request $request)
    {
        //dd($request->all());
        $compra = new Compras();
        $compra->fecha_del  = $request->fecha_del;
        $compra->fecha_hasta= $request->fecha_hasta;
        $compra->comentario = $request->comentario;
        $compra->save();

        Alert::success('Semana', 'Creada Correctamente');
        return redirect('compras/editar/'.Hashids::encode($compra->id));
    }
    public function editar($hash){
        $id     = Hashids::decode($hash);
        $compra = Compras::find($id[0]);
        $cantidad           = Compras_detalles::where('compra_id', $compra->id)->count();
        //dd($compra, $cantidad);
        $cantidad_2         = Pagos::where('programacion_id', $compra->id)->count();
        if($cantidad>0){
            $compra_detalles    = Compras_detalles::where('compra_id', $compra->id)->get();
            $total_programacion= $compra_detalles->sum('total');
        }else{
            $compra_detalles =0;
            $total_programacion= 0;
        }
        if($cantidad_2>0){
            $pagos              = Pagos::where('programacion_id', $compra->id)->get();
            $total_programacion_pagado = $pagos->sum('cantidad');
        }else{
            $pagos =0;
            $total_programacion_pagado= 0;
        }
        //dd($compra_detalles);
        $proveedores    = Proveedores::where('estatus',1)->pluck('nombre','id');
        $productos      = Productos::where('estatus',1)->pluck('descripcion','id');
        $empresas   =[
            0=> 'Saladita',
            1=> 'Escuinapan'
        ];
        $usuarios   =[
            0=> 'Adolfo R',
            1=> 'Frank Cruz'
        ];

        return view('compras.editar',compact('total_programacion_pagado','total_programacion','compra_detalles','cantidad','proveedores','compra','productos','empresas','usuarios'));
    }
    public function excel($hash){
        $id = Hashids::decode($hash);
        $compra = Compras::find($id[0]);

        $compra_id  = $compra->id;
        $fecha_hoy  =Date::now();

        //return view('compras.excel', compact('compra_id'))
        return Excel::download(new \App\Exports\ComprasExport($compra_id, $fecha_hoy), 'compra_'.$fecha_hoy.'.xlsx');

    }

    public function update( Request $req){

        $compra                 = Compras::find($req->id);
        $compra->comentario     = $req->comentario;
        $compra->fecha_del      = $req->fecha_del;
        $compra->fecha_hasta    = $req->fecha_hasta;
        $compra->save();

        Alert::success('Programacion', 'Actualizada Correctamente');
        return redirect()->back();
    }
    public function update_detalle(Request $req){


        $detalle    =Compras_detalles::find($req->id);

        if($req->pagado && $detalle->estatus ==2){
            Alert::warning('Pago En Proceso', 'Agrega pago parcial');
            return redirect()->back();
        }

        $pago   = new Pagos();
        $pago->usuario_id               = Auth::user()->id;
        $pago->programacion_id          = $detalle->compra_id;
        $pago->programacion_detalle_id  = $detalle->id;
        $pago->descripcion              = $req->descripcion;
        //$pago->fecha                    = date('d-m-Y');

        if($req->pagado && $detalle->estatus ==1){

            $detalle->estatus   =3;
            $detalle->save();
            $pago->cantidad                 = $detalle->total;
            if ($req->hasFile('file')){
                $file                   = $req->file('file');
                $file_name              = 'pago_'.$detalle->producto->nombre.'_'.$detalle->fecha.'.pdf';
                $path                   = $file->storeAs('documentos/pagos',$file_name);
                $pago->archivo          = $file_name;
                $pago->url              = $path ;
            }
            $pago->save();

            Alert::success('Pago Completo', 'Realizado con Exito');
            return redirect()->back();
            //dd($detalle);
        }else{
            //dd('es abono');
            $detalle->estatus   =2;
            $detalle->save();
            $pago->cantidad      = $req->cantidad;
            $pago->save();

            if ($req->hasFile('file_2')){
                $file                   = $req->file('file_2');
                $file_name              = $pago->id.'_pago_'.$detalle->producto->nombre.'_'.$detalle->fecha.'.pdf';
                $path                   = $file->storeAs('documentos/pagos',$file_name);
                $pago->archivo          = $file_name;
                $pago->url              = $path ;
            }
            $pago->save();

            $total_pagado   = Pagos::where('programacion_detalle_id', $detalle->id)->sum('cantidad');
            //dd('dsds', $total_pagado, $detalle->total);

            if($total_pagado >= $detalle->total){
                $detalle->estatus   =3;
                $detalle->save();

                Alert::success('Pago Completado', 'Realizado con Exito');
                return redirect()->back();
            }

            //dd($detalle->total, $total_pagado)

            Alert::success('Abonó', '$'.$pago->cantidad.' a '. $detalle->producto->descripcion);
            return redirect()->back();
        }
        //dd($req->all());
    }
}
