<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('admin.buku',compact('buku','kategori'));
    }
    public function create(){
        $kategori = Kategori::all();
        return view('admin.buku', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=> 'required',
            'penulis'=> 'required',
            'penerbit'=> 'required',
            'tahun_terbit'=> 'required',
            'status_buku' => 'required',
            'kategori_id'=> 'required',
            ]);

        $buku = new Buku;

        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->status_buku = $request->status_buku;
        $buku->kategori_id = $request->kategori_id;

        $buku->save();
        Session::flash('status', 'Buku Berhasil Ditambahkan');
        Session::flash('message', 'Buku Berhasil Ditambahkan');

        return redirect()->route('buku');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        Session::flash('status', 'Buku Berhasil Dihapus');
        Session::flash('message', 'Buku Berhasil Dihapus');

        return redirect()->route('buku');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->kategori_id = $request->kategori_id;
        $buku->save();

        Session::flash('status', 'Buku Berhasil Diupdate');
        Session::flash('message', 'Buku Berhasil Diupdate');
        return redirect()->route('buku');
    }
}
