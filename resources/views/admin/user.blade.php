@extends('layouts.app')
@section('title','Data User')
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
                        Tambah User
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
                                    <form class="row g-3" method="POST" action="{{ route('storeu') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="inputUsername">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="inputPassword">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputNama_Lengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control"
                                                id="inputNama_Lengkap">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPhone" class="form-label">Nomor Telfon</label>
                                            <input type="text" name="phone" class="form-control" id="inputPhone">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAlamat" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="inputAlamat">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputLevel" class="form-label">Level</label>
                                            <select name="status" class="form-select"
                                                aria-label="Default select example">
                                                <option selected="">pilih status akun</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputLevel" class="form-label">Level</label>
                                            <select name="level" class="form-select"
                                                aria-label="Default select example">
                                                <option selected="">pilih level</option>
                                                <option value="admin">Admin</option>
                                                <option value="petugas">Petugas</option>
                                                <option value="peminjam">Peminjam</option>
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
                                <th>Email</th>
                                <th>Username</th>
                                <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                <th>Alamat</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $d)
                            <tr class="align-items-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->username }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ $d->level }}</td>
                                <td>@if($d->status == 'active')
                                    <span class="badge rounded-pill bg-info text-light">{{ $d->status }}</span>
                                    @endif
                                    @if($d->status == 'inactive')
                                    <span class="badge rounded-pill bg-danger text-light">{{ $d->status }}</span>
                                    @endif
                                    <!-- <select class="form-select" aria-label="Default select example">
                      <option selected="">Open this select menu</option>
                      <option value="1">One</option>
                    </select> -->
                                </td>
                                <td>
                                    <form action="{{ route('delete', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#smallModal{{$d->id}}" ><i class="bi bi-pencil"></i></button>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            <!-- edit -->
                            <div class="modal fade" id="smallModal{{ $d->id }}" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <!-- Vertical Form -->
                                            <form class="row g-3" method="POST" action="{{ route('updateu',$d->id) }}">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputUsername" class="form-label">Username</label>
                                                    <input type="text" value="{{$d->username}}" name="username" class="form-control"
                                                        id="inputUsername">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmail" class="form-label">Email</label>
                                                    <input type="email" value="{{$d->email}}" name="email" class="form-control"
                                                        id="inputEmail">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputNama_Lengkap" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="text" value="{{$d->nama_lengkap}}" name="nama_lengkap" class="form-control"
                                                        id="inputNama_Lengkap">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputPhone" class="form-label">Nomor Telfon</label>
                                                    <input type="text" value="{{$d->phone}}" name="phone" class="form-control"
                                                        id="inputPhone">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                                    <input type="text" value="{{$d->alamat}}" name="alamat" class="form-control"
                                                        id="inputAlamat">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputLevel" class="form-label">Level</label>
                                                    <select name="status" class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected="{{$d->status}}">{{$d->status}}</option>
                                                        @if($d->status == 'inactive')
                                                        <option value="active">Active</option>
                                                        @endif
                                                        @if($d->status == 'active')
                                                        <option value="inactive">Inactive</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputLevel" class="form-label">Level</label>
                                                    <select name="level" class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected="{{$d->level}}">{{$d->level}}</option>
                                                        @if($d->level == 'admin')
                                                        <option value="petugas">Petugas</option>
                                                        <option value="peminjam">Peminjam</option>
                                                        @endif
                                                        @if($d->level == 'petugas')
                                                        <option value="admin">Admin</option>
                                                        <option value="peminjam">Peminjam</option>
                                                        @endif
                                                        @if($d->level == 'peminjam')
                                                        <option value="admin">Admin</option>
                                                        <option value="petugas">Petugas</option>
                                                        @endif
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
