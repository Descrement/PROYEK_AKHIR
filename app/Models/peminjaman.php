<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_user',
        'id_buku',
        'judul_buku',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'id_pelanggan');
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku');
    }
}
