@php 
  function checkRouteActive($item, $segment, $menu = false){
    if($menu) if(Request::segment($segment) == $item) return 'menu-open';
    if(Request::segment($segment) == $item) return 'active';
  }
@endphp
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('beranda')}}" class="brand-link">
      ES | 
      <span class="brand-text font-weight-light">Expert System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ar-Razy Muhammad</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('beranda')}}" class="nav-link {{checkRouteActive('beranda', 1)}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{url('diagnose')}}" class="nav-link {{checkRouteActive('diagnose', 1)}}">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Diagnosis
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{checkRouteActive('master', 1, true)}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('master/gejala')}}" class="nav-link {{checkRouteActive('gejala', 2)}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gejala</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('master/penyakit')}}" class="nav-link {{checkRouteActive('penyakit', 2)}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('master/rule')}}" class="nav-link {{checkRouteActive('rule', 2)}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rules</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>