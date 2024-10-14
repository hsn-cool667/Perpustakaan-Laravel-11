<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KoleksisController extends Controller
{
    public function index()
    {
        $user = User::all();
        $buku = Buku::all();
        $koleksi = Koleksi::all();
        return view('admin.koleksi',compact('user','buku','koleksi'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'users_id' => 'required ',
            'bukus_id' => 'required '
        ]);

        $koleksi = new Koleksi;
        $koleksi->users_id = $request->users_id;
        $koleksi->bukus_id = $request->bukus_id;
        $koleksi->save();

        Session::flash('status', 'Koleksi Berhasil Ditambahkan');
        Session::flash('message', 'Koleksi Berhasil Ditambahkan');
        return redirect()->route('koleksi');
    }

    public function destroy($id)
    {
        $kategori = Koleksi::findOrFail($id);
        $kategori->delete();

        Session::flash('status', 'Koleksi Berhasil Dihapus');
        Session::flash('message', 'Koleksi Berhasil Dihapus');

        return redirect()->route('koleksi');
    }
}
