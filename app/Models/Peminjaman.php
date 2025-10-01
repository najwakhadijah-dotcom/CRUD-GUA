<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Nama tabel di database (supaya tidak salah jadi 'peminjamen')
    protected $table = 'peminjamans';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'user_id',
        'tanggal',
        'ruang',
        'proyektor',
        'keperluan',
        'status',
    ];

    /**
     * Relasi ke User
     * Setiap peminjaman dimiliki oleh 1 user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
