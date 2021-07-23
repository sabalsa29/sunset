

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="logo logo-light" style="margin: 3%" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sunset.jpg') }}" alt="logo"  height="45" />
    </a>

  </div>

  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav navbar-nav-left ">
      <li class="nav-item d-none d-xl-flex">
        <a href="{!! url('/compras') !!}" class="nav-link">Programacion</a>
      </li>

      <li class="nav-item dropdown ">

        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Catalogos</a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-3" aria-labelledby="topnav-pages">

            <a href="{!! url('/proveedores') !!}" class="dropdown-item arrow-down"> <i class="mdi mdi-account-multiple"></i> Proveedores</a>
            <a href="{!! url('/productos') !!}" class="dropdown-item"> <i class="mdi mdi-package-variant"></i> Productos</a>
        </div>
      </li>
      <li class="nav-item d-none d-xl-flex">
        <a href="/usuarios" class="nav-link" style="float: right">Usuarios</a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">{{ Auth::user()->nombre }}</span>
          <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/icono_mujer.png') }}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a class="dropdown-item p-0">
            <div class="d-flex border-bottom w-100 justify-content-center">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
              </div>
            </div>
          </a>
          <a class="dropdown-item"> Cambiar Contraseña </a>
          <a class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">Cerrar Session</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </li>
    </ul>
  </div>
</nav>


