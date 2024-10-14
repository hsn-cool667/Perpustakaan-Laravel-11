<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        $kategori = Kategori::all();
        return view('admin.dashboard',compact('user','buku','kategori','peminjaman'));
    }
}
