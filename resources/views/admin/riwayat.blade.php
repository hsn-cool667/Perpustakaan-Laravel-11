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
                    <a href="cetak.php" class="btn btn-success" onclick="window.print()">Buat Laporan</a>
<!-- End Small Modal-->
                    <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> -->

                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="data">
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
                                <th>Denda</th>
                               <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $d)
                            @if($d->status_peminjaman == 'selesai')
                                <tr class="align-items-center">
                               <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->user->nama_lengkap }}</td>
                                <td>{{ $d->buku->judul }}</td>
                                <td>{{ $d->tanggal_peminjaman	 }}</td>
                                <td>{{ $d->tanggal_pengembalian }}</td>
                                <td>
                                    @if($d->denda == null)
                                        {{ "tidak didenda" }}
                                    @endif
                                    {{"Rp".$d->denda}}
                                </td>
                                <td>
                                        <form action="{{ route('hapusrp',$d->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $peminjaman->buku_id }}" name="buku_id">
                                            <input type="hidden" value="tersedia" name="status_buku">
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
