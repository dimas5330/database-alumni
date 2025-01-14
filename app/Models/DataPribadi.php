<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DataPribadi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'goldar',
        'alamat',
        'angkatan',
        'nama_sekolah',
        'pendidikan_terakhir',
        'fakultas',
        'jurusan',
        'pekerjaan',
        'profesi',
        'nama_kantor',
        'alamat_kantor',
    ];

    protected $casts = [
        'tanggal_lahir' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
