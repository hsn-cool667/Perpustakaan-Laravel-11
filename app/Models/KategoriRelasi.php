<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriRelasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_relasis';
    protected $fillable = ['id'];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
