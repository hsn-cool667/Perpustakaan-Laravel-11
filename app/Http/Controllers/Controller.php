<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

abstract class Controller
{
    public function index()
    {
        $peminjmanan = Peminjaman::all();
        return view('cetak',compact('peminjaman'));
    }
}
