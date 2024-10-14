<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
        'username' => 'required',
        'password'=> 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active')
            {
                Session::flash('status', 'akun belum active');
                Session::flash('message', 'akun belum active, silahkan hubungi admin.');
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back();
            }
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin' || 'petugas')
            {
                return redirect()->route('dashboard');
            }
            if(Auth::user()->role_id == 'peminjam')
            {
                return redirect('/peminjam');
            }

            
        }

        return back()->withErrors([
            'email' => 'gagal login',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }

    public function sres(Request $request)
    {
        $request->validate([
            'username'=> 'required|unique:users',
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

        return redirect()->route('login');
    }
}
