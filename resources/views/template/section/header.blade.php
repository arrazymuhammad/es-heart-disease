@php 
  function checkRouteActive($item, $segment, $menu = false){
    if($menu) if(Request::segment($segment) == $item) return 'menu-open';
    if(Request::segment($segment) == $item) return 'active';
  }
@endphp

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{url('')}}" class="navbar-brand">
        <span class="brand-text font-weight-light">ES | Expert System</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{url('beranda')}}" class="nav-link {{checkRouteActive('beranda', 1)}}">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{url('diagnose')}}" class="nav-link {{checkRouteActive('diagnose', 1)}}">Diagnosis</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{url('master/gejala')}}" class="dropdown-item">Gejala </a></li>
              <li><a href="{{url('master/penyakit')}}" class="dropdown-item">Penyakit</a></li>
              <li><a href="{{url('master/rule')}}" class="dropdown-item">Rule</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Ar-Razy Muhammad
          <img src="{{url('/dist/img/user1-128x128.jpg')}}" alt="User Avatar" style="height: 100%; " class="img-circle">
        </a>
      </li>
      </ul>
    </div>
  </nav>