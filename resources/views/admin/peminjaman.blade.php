@extends('layouts.app')
@section('title','Data Peminjaman')
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
                    @can('peminjam')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                        Tambah Peminjaman
                    </button>
                    @endcan

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
                                    <form class="row g-3" method="POST" action="{{ route('pinjam') }}">
                                        @csrf
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                        <div class="col-12">
                                            <label for="inputLevel" class="form-label">Buku</label>
                                            <select name="buku_id" class="form-select"
                                                aria-label="Default select example">
                                                <option selected="">pilih Buku</option>
                                                @foreach($buku as $b)
                                                <option value="{{ $b->id }}">
                                                    @if($b->status_buku == 'tersedia')
                                                    {{ $b->judul}}
                                                    @endif
                                                </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="status_buku" value="dipinjam">
                                        </div>
                                        <!-- Vertical Form -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                               @can('petugas')
                               <th>Menu</th>
                               @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $d)
                                @if($d->status_peminjaman == 'proses')
                                <tr class="align-items-center">
                               <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->user->nama_lengkap }}</td>
                                <td>{{ $d->buku->judul }}</td>
                                <td>{{ $d->tanggal_peminjaman	 }}</td>
                                <td>{{ $d->tanggal_pengembalian }}</td>
                                <td>
                                    @can('petugas')
                                        <form action="{{ route('kembali',$d->id) }}" method="POST">
                                            @csrf
                                            <!-- <input type="hidden" value="{{$d->buku->id}}" name="buku_id">
                                            <input type="hidden" value="tersedia" name="status_buku"> -->
                                            <input type="hidden" value="selesai" name="status_peminjaman"> 
                                        <button type="submit" class="btn btn-success"><i>Kembalikan</i></button>
                                        </form>
                                    @endcan
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
