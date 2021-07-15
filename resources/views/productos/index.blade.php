@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href ="productos/crear" class="btn btn-success" > Agregar Producto</a>
            <hr>
            <h3 class="card-title">Productos</h3>
            <div class="table-responsive">
                <hr>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th> Accion </th>
                    <th> Codigo</th>
                    <th> Tipo </th>
                    <th> Categoria </th>
                    <th> Descripcion </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                  <tr>
                    <td> </td>
                    <td> {{ $producto->codigo }}</td>
                    <td> {{ $tipo[$producto->tipo] }}</td>
                    <td> {{ $categorias[$producto->categoria] }}</td>
                    <td> {{ $producto->descripcion }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

