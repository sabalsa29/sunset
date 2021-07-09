<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index(){
        //dd('llegaste');

        return view('compras.index');
    }
    
    public function create(){
        return view('compras.create');
    }

    public function store(Request $req){
        dd($req->all());
    }
}
