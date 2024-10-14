<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';
protected $fillable = ['user_id','buku_id','tanggal_peminjaman','tanggal_pengembalian','tanggal_kembali_fiks','denda', 'status_peminjaman'];

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class, 'user_id');
    }
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
