<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori',compact('kategori'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:kategoris',
        ]);

        $kategori = new Kategori;

        $kategori->name = $request->name;

        $kategori->save();

        Session::flash('status', 'Kategori Berhasil Ditambahkan');
        Session::flash('message', 'Kategori Berhasil Ditambahkan');
        return redirect()->route('kategori');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Session::flash('status', 'Kategori Berhasil Dihapus');
        Session::flash('message', 'Kategori Berhasil Dihapus');

        return redirect()->route('kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori',compact('kategori'));

        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->name = $request->name;
        $kategori->save();

        Session::flash('status', 'Kategori Berhasil Diupdate');
        Session::flash('message', 'Kategori Berhasil Diupdate');
        return redirect()->route('kategori');
    }
}