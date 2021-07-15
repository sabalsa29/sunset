@extends('layout.master')

@push('plugin-styles')
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href ="proveedores/crear" class="btn btn-success" > Agregar Proveedor</a>
            <hr>
            <h3 class="card-title">Proveedores</h3>
            <div class="table-responsive">
                <hr>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> Accion </th>
                    <th> Codigo</th>
                    <th> Nombre </th>
                    <th> Correo </th>
                    <th> Telefono </th>
                    <th> Domicilio </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                  <tr>
                    <td> </td>
                    <td> {{ $proveedor->codigo }}</td>
                    <td> {{ $proveedor->nombre }}</td>
                    <td> {{ $proveedor->email }}</td>
                    <td> {{ $proveedor->telefono }}</td>
                    <td> {{ $proveedor->domicilio }}</td>
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

