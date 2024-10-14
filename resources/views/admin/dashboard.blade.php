@extends('layouts.app')
@section('title','Dashboard')

@section('content')

<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Buku <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-book-read-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $buku->count() }}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Kategori <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-file-list-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$kategori->count()}}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            @can('admin')
            <div class="col-xxl-4 col-xl-12">

<div class="card info-card customers-card">

  <!-- <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div> -->

  <div class="card-body">
    <h5 class="card-title">User <span>| Jumlah</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6>{{ $user->count() }}</h6>
        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

      </div>
    </div>

  </div>
</div>

</div>
            @endcan<!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
              @can('petugas')
              <div class="card info-card sales-card">

<!-- <div class="filter">
  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
    <li class="dropdown-header text-start">
      <h6>Filter</h6>
    </li>

    <li><a class="dropdown-item" href="#">Today</a></li>
    <li><a class="dropdown-item" href="#">This Month</a></li>
    <li><a class="dropdown-item" href="#">This Year</a></li>
  </ul>
</div> -->

<div class="card-body">
  <h5 class="card-title">Peminjaman <span>| Jumlah</span></h5>

  <div class="d-flex align-items-center">
    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="ri-shopping-basket-line"></i>
    </div>
    <div class="ps-3">
      <h6>{{ $peminjaman->count() }}</h6>
      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

    </div>
  </div>
</div>

</div>
              @endcan
<!-- End Recent Activity -->

          <!-- Budget Report -->
<!-- End Budget Report -->

          <!-- Website Traffic -->
         <!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>
@endsection