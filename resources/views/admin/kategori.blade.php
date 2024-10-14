@extends('layouts.app')
@section('title','Kategori')
@section('content')
@session('status')
               <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  {{ Session('message') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
               @endsession
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Data</h5>
                            <!-- Small Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                Tambah Kategori
              </button>

              <div class="modal fade" id="smallModal" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Small Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                                      <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="{{ route('storek') }}">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="text" name="name" class="form-control" id="inputNanme4">
                </div>
             <!-- Vertical Form -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Small Modal-->
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr class="align-items-center">
                    <th>
                      <b>N</b>o
                    </th>
                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th>Nama</th>
                    <th>Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($kategori as $d)
                  <tr class="align-items-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->name }}</td>
                    <td>
                    <form  action="{{ route('delete', $d->id) }}" method="post">
                      @csrf
                      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#smallModal{{$d->id}}"><i class="bi bi-pencil"></i></button>
                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                    
                    <div class="modal fade" id="smallModal{{$d->id}}" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Small Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                                      <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="{{ route('updatek', $d->id) }}">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="text" name="name" value="{{$d->name}}" class="form-control" id="inputNanme4">
                </div>
             <!-- Vertical Form -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection