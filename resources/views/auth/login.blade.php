@extends('layouts.app')
@section('content')

<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
            <label class="label">Correo Electronico</label>
            <div class="input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Contraseña</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Login</button>
          </div>
          <div class="form-group d-flex justify-content-between">

            <a href="#" class="text-small forgot-password text-black">Olvide mi Contraseña</a>
          </div>

        </form>
      </div>

      <p class="footer-text text-center">Sunset Tropical de la Costa Grandeee.</p>
    </div>
  </div>
</div>

@endsection
