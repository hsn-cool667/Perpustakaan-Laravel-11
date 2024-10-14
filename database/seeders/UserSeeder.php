<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin667'),
        'nama_lengkap' => 'Adminnn',
        'phone' => '12345',
        'alamat'=> 'test',
        'status'=> 'active',
        'level' => 'admin'
        ]);

        User::create([
            'username' => 'peminjam1',
            'email' => 'peminjam1@gmail.com',
            'password' => Hash::make('admin667'),
            'nama_lengkap' => 'Peminjam1',
            'phone' => '12345',
            'alamat'=> 'test',
            'status'=> 'active',
            'level' => 'peminjam'
        ]);
        User::create([
            'username' => 'peminjam2',
            'email' => 'peminjam2@gmail.com',
            'password' => Hash::make('admin667'),
            'nama_lengkap' => 'Peminjam2',
            'phone' => '12345',
            'alamat'=> 'test',
            'status'=> 'inactive',
            'level' => 'peminjam'
        ]);
    }
}
