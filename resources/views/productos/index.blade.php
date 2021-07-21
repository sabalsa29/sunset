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
                    <th> Descripcion </th>
                    <th> Tipo </th>
                    <th> Categoria </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                  <tr>
                      <td>
                        <form action="{{url('productos/destroy') }}" method="post">
                            @csrf
                            <a href="/productos/editar/{{ Hashids::encode($producto->id) }}"> <i class="mdi mdi-grease-pencil"></i> </a>
                            <button type="button" class="btn-danger " data-original-title="" title="" onclick="confirm('{{ "¿Estás seguro de eliminar el Producto?" }}') ? this.parentElement.submit() : ''">
                                <i class="mdi mdi-delete"> </i>
                            </button>
                        {!! Form::hidden("id", $producto->id) !!}
                        </form>

                    </td>
                    <td> {{ $producto->codigo }}</td>
                    <td> {{ $producto->descripcion }}</td>
                    <td> {{ $tipo[$producto->tipo] }}</td>
                    <td> {{ $categorias[$producto->categoria] }}</td>
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

