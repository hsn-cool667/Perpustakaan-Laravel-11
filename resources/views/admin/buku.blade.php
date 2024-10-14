@extends('layouts.app')
@section('title','Data Buku')
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
                        Tambah Buku
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
                                    <form class="row g-3" method="POST" action="{{ route('storeb') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputJudul" class="form-label">Judul</label>
                                            <input type="text" name="judul" class="form-control" id="inputJudul">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPenulis" class="form-label">Penulis</label>
                                            <input type="text" name="penulis" class="form-control" id="inputPenulis">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPenerbit" class="form-label">Penerbit</label>
                                            <input type="text" name="penerbit" class="form-control" id="inputPenerbit">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputTahun_Terbit" class="form-label">Tahun Terbit</label>
                                            <input type="number" name="tahun_terbit" class="form-control"
                                                id="inputTahun_Terbit">
                                        </div>
                                        <input type="hidden" name="status_buku" value="tersedia" class="form-control">
                                        <div class="col-12">
                                            <label for="inputStock" class="form-label">Kategori</label>
                                            <select name="kategori_id" class="form-select"
                                                aria-label="Default select example">
                                                <option selected="">pilih kategori</option>
                                                @foreach($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Vertical Form -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                                <th>Judul</th>
                                <th>Penulis</th>
                                <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Status</th>
                                <th>Kategori</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $d)
                            <tr class="align-items-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->penulis }}</td>
                                <td>{{ $d->penerbit }}</td>
                                <td>{{ $d->tahun_terbit }}</td>
                                <td>{{$d->status_buku}}</td>
                                <td>{{ $d->kategori->name }} </td>
                                <td>
                                    <form action="{{ route('deleteb', $d->id) }}" method="post">
                                        @csrf
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#smallModal{{$d->id}}"><i class="bi bi-pencil"></i></button>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>


                                    <div class="modal fade" id="smallModal{{$d->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Small Modal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- Vertical Form -->
                                                    <form class="row g-3" method="POST" action="{{ route('updateb',$d->id) }}">
                                                        @csrf
                                                        <div class="col-12">
                                                            <label for="inputJudul" class="form-label">Judul</label>
                                                            <input type="text" value="{{ $d->judul }}" name="judul" class="form-control"
                                                                id="inputJudul">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputPenulis" class="form-label">Penulis</label>
                                                            <input type="text" value="{{ $d->penulis }}" name="penulis" class="form-control"
                                                                id="inputPenulis">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputPenerbit"
                                                                class="form-label">Penerbit</label>
                                                            <input type="text" value="{{ $d->penerbit }}" name="penerbit" class="form-control"
                                                                id="inputPenerbit">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputTahun_Terbit" class="form-label">Tahun
                                                                Terbit</label>
                                                            <input type="number" value="{{ $d->tahun_terbit }}" name="tahun_terbit"
                                                                class="form-control" id="inputTahun_Terbit">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputStock" class="form-label">Kategori</label>
                                                            <select name="kategori_id" class="form-select"
                                                                aria-label="Default select example">
                                                                <option selected="{{$d->kategori->name}}">{{$d->kategori->name}}</option>
                                                                @foreach($kategori as $k)
                                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Vertical Form -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
