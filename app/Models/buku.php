<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'foto',
    ];

    protected $dates = [
        'tahun_terbit',
        'created_at',
        'updated_at',
    ];
    public function peminjaman()
    {
        return $this->hasOne(peminjaman::class, 'id_user');
    }
}
