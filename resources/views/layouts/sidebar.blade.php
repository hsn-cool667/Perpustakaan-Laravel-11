 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="{{ route('dashboard')}}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     @can('admin')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('user') }}">
         <i class="bi bi-person"></i><span>Data User</span><i class=" ms-auto"></i>
       </a>
       <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       </ul>
     </li>
     @endcan
     <!-- End Components Nav -->

     @can('petugas')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('kategori') }}">
         <i class="bi bi-menu-button-wide"></i><span>Data Kategori</span><i class="ms-auto"></i>
       </a>
       <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       </ul>
     </li><!-- End Forms Nav -->
     @endcan

     @can('petugas')
     <li class="nav-item">
       <a class="nav-link" href="{{ route('buku') }}">
         <i class="bi bi-journal-text "></i><span>Data Buku</span><i class="ms-auto"></i>
       </a>
       <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       </ul>
     </li>
     @endcan
     <!-- End Tables Nav -->

     @can('peminjam')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('peminjaman') }}">
         <i class="bi bi-bar-chart"></i><span>Peminjaman</span><i class="ms-auto"></i>
       </a>
     </li>
     @endcan

     @can('peminjam')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('koleksi') }}">
         <i class="bi bi-bookmark-star-fill"></i><span>Koleksi</span><i class="ms-auto"></i>
       </a>
     </li>
     @endcan


     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('ulasan') }}">
         <i class="bi bi-bookmark-star-fill"></i><span>Ulasan</span><i class="ms-auto"></i>
       </a>
     </li>


     @can('admin')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('transaksi') }}">
         <i class="bi bi-person"></i><span>Transaksi</span><i class=" ms-auto"></i>
       </a>
       <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       </ul>
     </li>
     @endcan

     @can('petugas')
     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('riwayat') }}">
         <i class="bi bi-person"></i><span>Riwayat Peminjaman </span><i class=" ms-auto"></i>
       </a>
       <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
       </ul>
     </li>
     @endcan
     <!-- End Charts Nav -->
     <!-- End Icons Nav -->

 </aside>