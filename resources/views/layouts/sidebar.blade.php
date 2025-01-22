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
      <a href="./data-mahasiswa " class="nav-link collapsed">
        <i class="bi bi-people-fill"></i>
        <span>Data Mahasiswa</span>
      </a>
    </li><!-- End Nav -->


    <span>Penduduk</span>

    <!-- Nav -->
    <li class="nav-item">
      <a href="./data-operator " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Operator</span>
      </a>
    </li><!-- End Nav -->

     <!-- Nav -->
     <li class="nav-item">
      <a href="./penduduks " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Penduduk</span>
      </a>
    </li><!-- End Nav -->

    <span>Laundry</span>

     <!-- Nav -->
     <li class="nav-item">
      <a href="./pelanggan " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Pelanggan</span>
      </a>
    </li><!-- End Nav -->


     <!-- Nav -->
     <li class="nav-item">
      <a href="./harga-laundry " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Harga Laundry</span>
      </a>
    </li><!-- End Nav -->

     <!-- Nav -->
     <li class="nav-item">
      <a href="./pembayaran_laundry " class="nav-link collapsed">
        <i class="bi bi-person-fill"></i>
        <span>Pembayaran Laundry</span>
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
