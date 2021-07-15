<?php

namespace App\Http\Controllers;

use App\Models\Compras_detalles;
use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
use App\Models\Compras;
use Hashids;
use Date;
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
        if($cantidad>0){
            $compra_detalles    = Compras_detalles::where('compra_id', $compra->id)->get();
        }else{
            $compra_detalles=0;
        }
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

        return view('compras.editar',compact('compra_detalles','cantidad','proveedores','compra','productos','empresas','usuarios'));
    }
    public function excel($hash){
        $id = Hashids::decode($hash);
        $compra = Compras::find($id[0]);

        $compra_id  = $compra->id;
        $fecha_hoy  =Date::now();

        //return view('compras.excel', compact('compra_id'))
        return Excel::download(new \App\Exports\ComprasExport($compra_id, $fecha_hoy), 'compra_'.$fecha_hoy.'.xlsx');

    }
}
