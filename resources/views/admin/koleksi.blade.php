@extends('layouts.app')
@section('title','Koleksi')
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

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                        Tambah Koleksi
                    </button>

                    <div class="modal fade" id="smallModal" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Small Modal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- Vertical Form -->
                                    <form class="row g-3" method="POST" action="{{ route('kolek') }}">
                                        @csrf
                                        <div class="col-12">
                                          <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                                            <select name="bukus_id" class="form-select"
                                                aria-label="Default select example">
                                                <option selected="">pilih buku</option>
                                                @foreach($buku as $b)
                                                <option value="{{ $b->id }}">{{ $b->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Vertical Form -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Small Modal-->
                    <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> -->

                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="data">
                        <thead>
                            <tr class="align-items-center">
                                <th>
                                    <b>N</b>o
                                </th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                <!-- <th>kategori</th> -->
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($koleksi as $d)
                            @if(Auth::user()->id)
                            <tr class="align-items-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->user->nama_lengkap }}</td>
                                <td>{{ $d->buku->judul }}</td>
                                <td>
                                    <form action="{{ route('hapusk',$d->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i>hapus</i></button>
                                    </form>

                                </td>
                            </tr>
                            @endif
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
