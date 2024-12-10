<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'pelayanan_perkantas',
        'jabatan_pelayanan',
        'nama_gereja',
        'pelayanan_sekarang',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
