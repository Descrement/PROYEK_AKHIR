<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'tgl_lahir',
        'created_at',
        'updated_at',
    ];

    public function pelanggan()
    {
        return $this->hasOne(pelanggan::class, 'id_user');
    }
}
