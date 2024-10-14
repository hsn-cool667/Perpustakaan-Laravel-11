<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'nama_lengkap'=> 'required',
            'phone'=> 'required',
            'alamat'=> 'required',
            'level'=> 'required',
            'status'=> 'required',
            'level' => 'required',
            ]);

        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->status = $request->status;
        $user->level = $request->level;

        $user->save();

        Session::flash('status', 'User Berhasil Ditambah');
        Session::flash('message', 'User Berhasil Ditambah');

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $kategori = User::findOrFail($id);
        $kategori->delete();

        Session::flash('status', 'User Berhasil Dihapus');
        Session::flash('message', 'User Berhasil Dihapus');
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user',compact('user'));

        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=> 'required',
            'email'=> 'required',
            // 'password'=> 'required',
            'nama_lengkap'=> 'required',
            'phone'=> 'required',
            'alamat'=> 'required',
            'level'=> 'required',
            'status'=> 'required',
            'level' => 'required',
            ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->status = $request->status;
        $user->level = $request->level;
        $user->save();

        Session::flash('status', 'User Berhasil Diupdate');
        Session::flash('message', 'User Berhasil Diupdate');
        return redirect()->route('user');
    }
}
