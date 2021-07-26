<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Alert;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores    = Proveedores::all();
        return view('proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
        $validator = Validator::make($request->all(), [
            'correo' => 'required|unique:proveedores,email'
        ]);


        if ($validator->fails()) {
            Alert::warning('Correo', 'Ya Existe');
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $proveedor  = new Proveedores();

        $proveedor->nombre        =$request->nombre;
        $proveedor->email         =$request->correo;
        $proveedor->telefono      =$request->telefono;
        $proveedor->domicilio     =$request->domicilio;

        $proveedor->save();

        Alert::success('Proveedor', 'Creado Correctamente ');
        return redirect('proveedores');
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
        $proveedor  = Proveedores::find($id[0]);

        return view('proveedores.editar', compact('proveedor'));
        dd($proveedor);
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
        $proveedor  = Proveedores::find($request->id);

        $proveedor->nombre      = $request->nombre;
        $proveedor->email       = $request->correo;
        $proveedor->telefono    = $request->telefono;
        $proveedor->domicilio   = $request->domicilio;
        $proveedor->save();

        Alert::success('Proveedor','Actualizado Correctamente');
        return redirect('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
