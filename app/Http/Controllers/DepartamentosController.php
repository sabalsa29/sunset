<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use Illuminate\Http\Request;
use Alert;
use Vinkla\Hashids\Facades\Hashids;


class DepartamentosController extends Controller
{
    public function index(){
        return view('departamentos.index');

    }

    public function crear(){

        return view('departamentos.create');
    }

    public function store(Request $req){
        //dd($req->all());

        $departamento   = new Departamentos();
        $departamento->codigo   = $req->codigo;
        $departamento->descripcion  = $req->descripcion;
        $departamento->save();

        Alert::success('Departamento','Creado Correctamente');
        return redirect('departamentos');
    }
}
