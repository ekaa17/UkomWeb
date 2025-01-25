<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard Nav -->
    <li class="nav-item">
      <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->



     <!-- Nav -->
     <li class="nav-item">
      <a href="./data-operator " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Operator</span>
      </a>
    </li><!-- End Nav -->

    <!-- Nav -->
    <li class="nav-item">
      <a href="./data-pegawai " class="nav-link collapsed">
        <i class="bi bi-person-circle"></i>
        <span>Pegawai</span>
      </a>
    </li><!-- End Nav -->

    <li class="nav-item">
      <a href="./kecamatan " class="nav-link collapsed">
        <i class="bi bi-house-fill"></i>
        <span>Kecamatan</span>
      </a>
    </li><!-- End Nav -->

    <li class="nav-item">
      <a href="./kelurahan " class="nav-link collapsed">
        <i class="bi bi-house"></i>
        <span>Kelurahan</span>
      </a>
    </li><!-- End Nav -->


    <li class="nav-item">
      <a href="./penduduk " class="nav-link collapsed">
        <i class="bi bi-people-fill"></i>
        <span>Penduduk</span>
      </a>
    </li><!-- End Nav -->


 


   
    {{-- <!-- Logout Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Logout Nav --> --}}

  </ul>

</aside><!-- End Sidebar -->
