<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $user = User::all();
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman',compact('user','buku','peminjaman'));
    }

    public function pinjam(Request $request)
    {
        $request->validate([
            'user_id' => 'required | exists:users,id',
            'buku_id' => 'required | exists:bukus,id',
            'status_buku' => 'required',
        ]);

        $tanggalPinjam = Carbon::now();
        $tanggalkembali = $tanggalPinjam->copy()->addDays(7);

        $peminjaman = new Peminjaman;
        $peminjaman->user_id = $request->user_id;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->tanggal_peminjaman = $tanggalPinjam;
        $peminjaman->tanggal_pengembalian = $tanggalkembali;
        $peminjaman->save();

        $buku = Buku::findOrFail($request->buku_id);
        $buku->status_buku = $request->status_buku;
        $buku->save();



        Session::flash('status', 'Peminjaman Berhasil Ditambahkan');
        Session::flash('message', 'Peminjaman Berhasil Ditambahkan');
        return redirect()->route('peminjaman');
    }

    public function kembali(Request $request, $id)
{
    $request->validate([
        'status_peminjaman' => 'required',
    ]);

    $peminjaman = Peminjaman::findOrFail($id); // This should return a single instance
    $tanggakAktual = Carbon::now();
    $peminjaman->tanggal_kembali_fiks = $tanggakAktual;
    $peminjaman->status_peminjaman = $request->status_peminjaman;
    $peminjaman->save();

    if($tanggakAktual->greaterThan($peminjaman->tanggal_pengembalian))
    {
        $daysLate = $tanggakAktual->diffInDays($peminjaman->tanggal_pengembalian); // Make sure you use 'tanggal_pengembalian'
        $denda = $daysLate * 2000;
        $peminjaman->denda = $denda;
        $peminjaman->save();
        Session::flash('status', 'Buku Berhasil Dikembalikan Dengan Denda Keterlambatan');
        Session::flash('message', 'Buku Berhasil Dikembalikan Dengan Denda Keterlambatan');
        return redirect()->route('riwayat');
    }
    Session::flash('status', 'Buku Berhasil Dikembalikan');
    Session::flash('message', 'Buku Berhasil Dikembalikan');
    return redirect()->route('riwayat');
}

    public function riwayat()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.riwayat',compact('peminjaman'));
    }

    public function hapusrp($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        Session::flash('status', 'Riwayat Peminjaman Berhasil Dihapus');
        Session::flash('message', 'Riwayat Peminjaman Berhasil Dihapus');

        return redirect()->route('riwayat');
    }
}