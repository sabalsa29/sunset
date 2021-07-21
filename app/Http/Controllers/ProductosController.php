<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Alert;
use App\Models\Compras;
use App\Models\Compras_detalles;
use Hashids;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos  = Productos::all();
        $tipo           = config('sistema.tipo_productos');
        $categorias     = config('sistema.categorias');

        return view('productos.index', compact('productos', 'tipo', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo           = config('sistema.tipo_productos');
        $categorias     = config('sistema.categorias');

        return view('productos.create', compact('tipo', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $producto               = new Productos();
        $producto->tipo         = $request->tipo;
        $producto->categoria    = $request->categoria_id;
        $producto->descripcion  = $request->descripcion;
        $producto->save();

        Alert::success('Producto', 'Creado Correcto');
        return redirect('productos');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($hash)
    {
        $id = Hashids::decode($hash);
        $producto   = Productos::find($id[0]);


        $tipo           = config('sistema.tipo_productos');
        $categorias     = config('sistema.categorias');

        return view('productos.editar', compact('producto', 'tipo', 'categorias'));
        //dd($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto   = Productos::find($request->id);

        $producto->tipo = $request->tipo;
        $producto->categoria    = $request->categoria_id;
        $producto->descripcion  = $request->descripcion;
        $producto->save();

        Alert::success('Producto', 'Actualizado Correctamente');
        return redirect('productos');
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());

        $cantidad   = Compras_detalles::where('producto_id', $request->id)->count();

        if($cantidad>0){
            Alert::warning('Producto', 'No puede Eliminarse');
            return redirect()->back();
        }else{

            $producto   = Productos::find($request->id);
            $producto->delete();
            Alert::success('Producto', 'Eliminado Correctamente');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
