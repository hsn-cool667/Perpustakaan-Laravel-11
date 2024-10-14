<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = 'koleksis';

    protected $fillable = ['id','users_id', 'bukus_id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'bukus_id');
    }
    
}
