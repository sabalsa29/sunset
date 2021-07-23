@extends('layout.master')

@push('plugin-styles')
@endpush
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href ="departamentos/crear" class="btn btn-success" > Agregar Departamento</a>
            <hr>
            <h3 class="card-title">Departamentos</h3>
            <div class="table-responsive">
                <hr>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> Accion </th>
                    <th> Codigo</th>
                    <th> Nombre </th>
                    <th> Estatus </th>

                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

